<?php

namespace App\Models;

use App\Models\Stage;
use App\Models\TermSubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    public function termSubject()
    {
        return $this->hasMany(TermSubject::class);
    }
}
