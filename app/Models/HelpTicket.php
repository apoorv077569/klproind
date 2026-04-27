<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class HelpTicket extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'ticket_id',
        'user_id',
        'booking_id',
        'subject',
        'category',
        'priority',
        'description',
        'status',
    ];

    protected $hidden = [
        'deleted_at',
        'updated_at',
    ];

    /**
     * Get the user who raised the ticket.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    /**
     * Get the booking associated with the ticket.
     */
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class, 'booking_id')->withTrashed();
    }

    /**
     * Get replies for the ticket.
     */
    public function replies(): HasMany
    {
        return $this->hasMany(TicketReply::class, 'help_ticket_id');
    }
}
