<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolParentRank extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function parent()
    {
        return $this->belongsTo(User::class);
    }
}
