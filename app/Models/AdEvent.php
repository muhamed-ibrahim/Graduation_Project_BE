<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdEvent extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function Schools()
    {
        return $this->belongsToMany(School::class);
    }

    public function parents()
    {
        return $this->belongsToMany(User::class);
    }
}
