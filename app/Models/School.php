<?php

namespace App\Models;

use App\Models\EnrollRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function adminstration()
    {
        return $this->belongsTo(Adminstration::class);
    }

    public function Manager()
    {
        return $this->hasOne(SchoolManager::class);
    }

    public function Events()
    {
        return $this->belongsToMany(AdEvent::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function enrollRequest()
    {
        return $this->belongsToMany(EnrollRequest::class);
    }

    public function tansferRequest()
    {
        return $this->hasMany(TransferRequest::class);
    }

    public function staff()
    {
        return $this->hasMany(SchoolStaff::class);
    }

    public function stages()
    {
        return $this->belongsToMany(Stage::class);
    }
}
