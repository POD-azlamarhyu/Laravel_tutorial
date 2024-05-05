<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Favorite;

class Tweet extends Model
{
    use HasApiTokens,HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'content',
        'tweet_image',
        'tweet_video',
    ];

    protected $hidden = [
        'user_id'
    ];

    // protected $primaryKey='tweet_id';

    public function user() :BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function favorite() :HasMany{
        return $this->hasMany(Favorite::class);
    }
}
