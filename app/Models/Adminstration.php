<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminstration extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function AdAdmins()
    {
        return $this->hasMany(AdAdmin::class);
    }

    public function Schools()
    {
        return $this->hasMany(School::class);
    }

    public function Report()
    {
        return $this->hasMany(Report::class);
    }
    //create event
    public function event()
    {
        return $this->hasMany(AdEvent::class);
    }




}
