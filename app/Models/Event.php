<?php
// app/Models/Event.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Event extends Model
{
    
    protected $fillable = [
        'title', 'description', 'date', 'time', 'location', 'creator_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}

