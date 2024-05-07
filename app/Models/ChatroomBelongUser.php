<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ChatRoom;

class ChatroomBelongUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'room_id',
    ];

    public function chatroom() : BelongsTo {
        return $this->belongsTo(ChatRoom::class);
    }

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }
}
