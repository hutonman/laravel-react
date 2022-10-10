<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'is_done',
    ];

    protected $casts = [
        'is_done' => 'bool'
    ];
}
