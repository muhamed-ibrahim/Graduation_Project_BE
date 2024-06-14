<?php

namespace App\Models;

use App\Models\Term;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TermSubject extends Model
{
    use HasFactory;
    // protected $table = 'term_subjects';
    protected $guarded = [];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
