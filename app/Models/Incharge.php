<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Incharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'password',
        'name',
    ];

   
}