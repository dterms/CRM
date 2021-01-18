<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Specific_category extends Model
{
    protected $table = 'specific_categories';

    protected $fillable = [
        'title',
        'image'
    ];
}
