<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Quizzes extends Model {
    protected $table = 'quizzes';
    protected $fillable = [
        'title', 'description', 'app_users_id'
    ];
}