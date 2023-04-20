<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'friend_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function friendFirstName()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function friendLastName()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function friendEmail()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function userFirstName()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function userLastName()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function userEmail()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
