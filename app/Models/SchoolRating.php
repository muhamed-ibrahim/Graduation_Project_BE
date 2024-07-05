<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolRating extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function school()
    {
        return $this->belongsTo(School::class);
    }
    public function parent()
    {
        return $this->belongsTo(User::class);
    }
}
