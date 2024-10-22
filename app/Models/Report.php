<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Schools()
    {
        return $this->belongsToMany(School::class);
    }

    public function adminstration()
    {
        return $this->belongsTo(Adminstration::class);
    }

}
