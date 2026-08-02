<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class contact extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function notifications()
    // {
    //     return $this->morphMany(Notification::class, 'notifiable');
    // }
    public function notifications()
    {
        return $this->hasOne(Notification::class, 'data', 'name');
    }

}
