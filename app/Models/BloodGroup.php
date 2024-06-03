<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BloodGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'bg_code',
        'bg_name',
    ];
}
