<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentParent extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ,SoftDeletes;





    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'father_name',
        'father_mobile',
        'father_profession',
        'father_image',
        'email',
        'password',
        'guardian_name',
        'guardian_mobile',
        'guardian_profession',
        'guardian_image',
        'guardian_email',
        'guardian_address',
        'guardian_relation',
        'father_nationality',
        'office_number',
        'office_address',
        'applicant_id',
        'status',
        'applicant_status',
        'role_id',
        'ip_address',
        'created_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
