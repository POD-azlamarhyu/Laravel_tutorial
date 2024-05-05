<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserInfo extends Model
{
    use HasFactory;

    /** @var array<int, string> */
    
    protected $fillable=[
        'user_id',
        'account_name',
        'user_bio',
        'icon',
        'account_id',
        'account_level'
    ];

    protected $hidden=[
        'account_level',
        'is_deleted'
    ];

    protected $primaryKey='userinfo_id';

    public function user() :BelongsTo{
        return $this->belongsTo(User::class);
    }
}
