<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Tweet;
use App\Models\UserInfo;
use App\Models\Favorite;
use App\Models\ChatRoom;
use App\Models\ChatroomBelongUser;

class User extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function userinfo() :HasOne{
        return $this->hasOne(UserInfo::class);
    }

    public function tweet() :HasMany{
        return $this->hasMany(Tweet::class);
    }

    public function favorite() :HasMany{
        return $this->hasMany(Favorite::class);
    }

    public function chatroom() :HasMany{
        return $this->hasMany(ChatRoom::class);
    }

    public function chatroom_belong_user() :HasMany{
        return $this->hasMany(ChatroomBelongUser::class);
    }

    public function message() :HasMany
    {
        return $this->hasMany(Message::class);
    }
}
