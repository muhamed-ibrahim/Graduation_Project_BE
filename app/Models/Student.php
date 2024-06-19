<?php

namespace App\Models;

use App\Models\Stage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function parent()
    {
        return $this->belongsTo(User::class);
    }
}
