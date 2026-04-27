<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class TicketReply extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'help_ticket_id',
        'user_id',
        'message',
    ];

    /**
     * Get the ticket this reply belongs to.
     */
    public function ticket(): BelongsTo
    {
        return $this->belongsTo(HelpTicket::class, 'help_ticket_id');
    }

    /**
     * Get the user who made the reply.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }
}
