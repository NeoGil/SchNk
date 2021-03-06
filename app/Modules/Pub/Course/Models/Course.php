<?php

namespace App\Modules\Pub\Course\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'alias',
        'title',
        'description',
    ];

}
