<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sliderpic extends Model
{
    use HasFactory;
    protected $table = 'sliderpic';

    protected $fillable = [
        'pic_description',
        'pic_path',
        'order_pic',
    ];
}
