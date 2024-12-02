<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class esession extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
       'speaker',
       'start_time',
       'end_time',
       'event_ref',
    ];
}
