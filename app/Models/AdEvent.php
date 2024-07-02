<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdEvent extends Model
{
    use HasFactory;
    protected $guarded = [];

    // send to many Schools
    public function Schools()
    {
        return $this->belongsToMany(School::class);
    }
    // send to many Parents
    public function parents()
    {
        return $this->belongsToMany(User::class);
    }
    // create event
    public function school()
    {
        return $this->belongsTo(School::class);
    }
    // create event
    public function adminstration()
    {
        return $this->belongsTo(Adminstration::class);
    }
}
