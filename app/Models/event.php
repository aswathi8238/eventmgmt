<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $primaryKey='event_id';
    use HasFactory;

protected $fillable = [

     'title',
    'description',
    'date',
    'location',
];
}