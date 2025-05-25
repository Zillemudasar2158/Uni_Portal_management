<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facultymem extends Model
{

    use HasFactory;

    protected $table = 'facultymem';

    protected $fillable = [
        'name',
        'CNIC',
        'email',
        'dept_id',
        'password',
        'designation',
        'deptname',
        'profile_img',
        'add_charge',
        'status',
    ];
}
