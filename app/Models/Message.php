<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'room_id',
        'direct_message',
        'dm_image',
        'dm_video'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function chatroom(): BelongsTo
    {
        return $this->belongsTo(ChatRoom::class);
    }
}
