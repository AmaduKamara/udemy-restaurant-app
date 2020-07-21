<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name - to change the table name
    protected $table = 'posts';
    // Primary key 
    public $primaryKey = 'id';
    // Timestamps 
    public $timestatms = true;

    // This set a relationship to a user. That this single post belongs to a user
    public function user()
    {
        return  $this->belongsTo('App\User');
    }
}
