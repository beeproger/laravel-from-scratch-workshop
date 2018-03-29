<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'user_id', 'done'
    ];

/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $casts = [
        'done' => 'boolean'
    ];

    public function owner(){
        return $this->belongsTo(User::class);
    } 
}
