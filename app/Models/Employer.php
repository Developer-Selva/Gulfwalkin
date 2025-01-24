<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name', 'country', 'place', 'address', 'po_box_no', 
        'contact_person_1', 'contact_number_1', 'email', 'password', 
        'verification_code'
    ];

    protected $hidden = ['password'];

    // Other relationships and methods can be defined here
}