<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Complaint;
use App\Models\User;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User','department_id','id');
    }
   
}
