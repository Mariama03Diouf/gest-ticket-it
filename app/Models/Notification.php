<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'ticket_id',
        'message',
        'read_at',
    ];

    /**
     * Get the user that the notification is for.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the ticket associated with the notification.
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
