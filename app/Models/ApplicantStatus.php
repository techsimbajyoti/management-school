<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'parent_id',
        'applicant_id',
        'status',
        'note',
        'ip_address',
        'created_by',
    ];
}
