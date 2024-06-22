<?php

namespace App\Models;

use App\Models\TermSubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Term extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function termSubject()
    {
        return $this->hasMany(TermSubject::class);
    }
}