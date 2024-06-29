<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'national_id',
        'address',
        'national_id_image',
        'birthdate',
        'gender',
        'lat',
        'lng',
    ];

    // children
    public function children(){
        return $this->hasMany(Child::class);
    }

    // schools
    public function recommendedSchools(){
        return $this->belongsToMany(School::class, 'school_parent_ranks', 'parent_id', 'school_id')->withPivot('compatibility');
    }

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
        'password' => 'hashed',
    ];

    // getter for national_id_image
    public function getNationalIdImageAttribute($value)
    {
        return asset('storage/parents/' . $value);
    }
}
