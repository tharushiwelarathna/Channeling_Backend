<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'email',
        'mobile',
        'dob',
        'address',
        'gender',
        'diseases'
     
    ];
}
