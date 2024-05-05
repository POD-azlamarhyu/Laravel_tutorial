<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Tweet;
use App\Models\User;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tweet_id',
    ];

    // protected $primaryKey='favorite_id';

    public function user() :BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function tweet() :BelongsTo{
        return $this->belongsTo(Tweet::class);
    }
}
