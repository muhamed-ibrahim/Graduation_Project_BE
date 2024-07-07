<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\EnrollRequest;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPasswordNotification;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function sendPasswordResetNotification($token)
    {
        $url = 'http://localhost:5173/resetPassword/' . $token;
        $this->notify(new ResetPasswordNotification($url));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'job',
        'phone',
        'national_id',
        'address',
        'national_id_image',
        'birthdate',
        'gender'
    ];
    protected $guarded = [];

    public function enrollRequest()
    {
        return $this->hasMany(EnrollRequest::class);
    }
    public function tansferRequest()
    {
        return $this->hasMany(TransferRequest::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function Events()
    {
        return $this->belongsToMany(AdEvent::class);
    }

    public function support()
    {
        return $this->hasMany(Support::class);
    }

    // schools
    public function recommendedSchools()
    {
        return $this->belongsToMany(School::class, 'school_user_ranks', 'parent_id', 'school_id')->withPivot('compatibility');
    }

    public function dataToRated(){
        return date('m') >= 8 && date('m') <= 9;
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
}
