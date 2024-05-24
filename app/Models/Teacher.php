<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
            'staff_id',
            'roles',
            'designations',
            'departments',
            'first_name',
            'last_name',
            'father_name',
            'mother_name',
            'email',
            'password',
            'gender',
            'date_of_birth',
            'joing_date',
            'phone',
            'marital_status',
            'image',
            'current_address',
            'parmanent_address',
            'basic_salary',
            'teacher_document',
            'status',
            'role_id',
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
