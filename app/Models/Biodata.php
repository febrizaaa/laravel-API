<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'latihan_biodata';
    public $timestamps = false;
    protected $hidden = [];
    protected $fillable = [
        'name',
        'fullname',
        'birthdate',
        'age',
        'child_count',
        'gender',
    ];
}
