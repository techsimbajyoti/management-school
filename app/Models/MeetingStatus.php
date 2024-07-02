<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'parent_id',
        'applicant_id',
        'meeting_date',
        'time_slot',
        'purpose',
        'mode',
        'status',
        'note',
        'ip_address',
        'created_by',
    ];
}
