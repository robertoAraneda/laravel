<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class State extends Model
{
    public function createdUser(){
        return $this->belongsTo(User::class, 'created_user_id');
    }

    public function updatedUser(){
        return $this->belongsTo(User::class, 'updated_user_id');
    }
}
 