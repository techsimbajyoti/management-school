<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'admission_no',
        'roll_no',
        'first_name',
        'last_name',
        'mobile',
        'email',
        'user_name',
        'password',
        'class',
        'section',
        'date_of_birth',
        'religion',
        'gender',
        'category',
        'blood_group',
        'admission_date',
        'image',
        'parent_name',
        'parent_mobile',
        'place_of_birth',
        'country',
        'state',
        'city',
        'pin_code',
        'student_language',
        'residence_address',
        'document',
        'parent_id',
        'applicant_id',
        'status',
        'role_id',
        'created_by'
    ];

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
     public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }


}
