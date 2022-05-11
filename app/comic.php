<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comic extends Model
{
    protected $fillable = [
        'thumb',
        'title',
        'description',
        'price',
        'series',
        'type',
        'sale_date',
    ];
}
