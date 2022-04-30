<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_email',
        'complaint_text',
        'department_id',
    ];

    public function department()
    {
        return $this->hasOne('App\Models\Department','id','department_id');
    }
}
