<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enquiry extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function notifications()
    {
        return $this->hasOne(Notification::class, 'data', 'name');
    }

}
