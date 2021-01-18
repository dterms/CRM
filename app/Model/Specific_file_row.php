<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Specific_file_row extends Model
{
    protected $table = 'specific_file_rows';

    protected $fillable = [
        'specification_id',
        'file_id'
    ];
}
