<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'gender', 'date_of_birth', 'education_qualification', 
        'phone', 'resume', 'email', 'password'
    ];

    protected $hidden = ['password'];

    // Other relationships and methods can be defined here
}
