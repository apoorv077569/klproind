<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Rename provider_zones to serviceman_zones to reflect its new use for all servicemen
        if (Schema::hasTable('provider_zones')) {
            Schema::rename('provider_zones', 'serviceman_zones');
            // If the old pivot had 'provider_id', let's rename it to 'serviceman_id' or 'user_id'
            // Schema::table('serviceman_zones', function (Blueprint $table) {
            //     if (Schema::hasColumn('serviceman_zones', 'provider_id')) {
            //         // Try to drop foreign key if it exists
            //         try {
            //             $table->dropForeign(['provider_id']);
            //         } catch (\Exception $e) {
            //         }

            //         $table->renameColumn('provider_id', 'user_id');
            //     }
            // });

            Schema::table('serviceman_zones', function (Blueprint $table) {
                if (Schema::hasColumn('serviceman_zones', 'provider_id')) {
                    $table->renameColumn('provider_id', 'user_id');
                }
            });
        }

        // 2. Remove provider_id from users (if it exists)
        if (Schema::hasColumn('users', 'provider_id')) {
            Schema::table('users', function (Blueprint $table) {
                try {
                    $table->dropForeign(['provider_id']);
                } catch (\Exception $e) {
                }
                $table->dropColumn('provider_id');
            });
        }

        // 3. Update bookings: remove provider_id, add zone_id and broadcast_status
        Schema::table('bookings', function (Blueprint $table) {
            if (Schema::hasColumn('bookings', 'provider_id')) {
                try {
                    $table->dropForeign(['provider_id']);
                } catch (\Exception $e) {
                }
                $table->dropColumn('provider_id');
            }

            if (!Schema::hasColumn('bookings', 'zone_id')) {
                $table->unsignedBigInteger('zone_id')->nullable()->after('coupon_id');
                $table->foreign('zone_id')->references('id')->on('zones')->onDelete('set null');
            }

            if (!Schema::hasColumn('bookings', 'broadcast_status')) {
                $table->string('broadcast_status')->nullable()->after('booking_status_id')->default('PENDING_BROADCAST')->comment('Status for zone-based broadcasting');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            if (Schema::hasColumn('bookings', 'zone_id')) {
                $table->dropForeign(['zone_id']);
                $table->dropColumn('zone_id');
            }
            if (Schema::hasColumn('bookings', 'broadcast_status')) {
                $table->dropColumn('broadcast_status');
            }
            $table->unsignedBigInteger('provider_id')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('provider_id')->nullable();
        });

        // if (Schema::hasTable('serviceman_zones')) {
        //     Schema::table('serviceman_zones', function (Blueprint $table) {
        //         if (Schema::hasColumn('serviceman_zones', 'user_id')) {
        //             $table->renameColumn('user_id', 'provider_id');
        //         }
        //     });
        //     Schema::rename('serviceman_zones', 'provider_zones');
        // }

        Schema::table('serviceman_zones', function (Blueprint $table) {
            if (Schema::hasColumn('serviceman_zones', 'provider_id')) {
                // Skip dropping FK, directly rename column
                $table->renameColumn('provider_id', 'user_id');
            }
        });
    }
};
