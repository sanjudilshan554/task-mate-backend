<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'status',
        'title',
        'description',
        'selected_date_time'
    ];
}
