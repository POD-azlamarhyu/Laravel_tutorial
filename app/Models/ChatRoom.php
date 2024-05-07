<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChatRoom extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'chatroom_name',
        'description'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function chatroom_belong_user(): HasMany{
        return $this->hasMany(ChatroomBelongUser::class);
    }
}
