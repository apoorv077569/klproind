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
        Schema::table('cart', function (Blueprint $table) {
            $table->boolean('is_package')->default(false)->after('required_servicemen');
            $table->unsignedBigInteger('service_package_id')->nullable()->after('service_id');
            $table->json('additional_services')->nullable()->after('service_type');
            $table->json('package_services')->nullable()->after('additional_services');
            $table->string('booking_frequency')->nullable()->after('package_services');
            $table->date('schedule_start_date')->nullable()->after('booking_frequency');
            $table->string('schedule_time')->nullable()->after('schedule_start_date');
            $table->json('scheduled_dates_json')->nullable()->after('schedule_time');

            $table->foreign('service_package_id')->references('id')->on('service_packages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cart', function (Blueprint $table) {
            $table->dropForeign(['service_package_id']);
            $table->dropColumn([
                'is_package',
                'service_package_id',
                'additional_services',
                'package_services',
                'booking_frequency',
                'schedule_start_date',
                'schedule_time',
                'scheduled_dates_json'
            ]);
        });
    }
};
