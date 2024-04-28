<?php

namespace App\Models;

use App\Models\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EnrollRequest extends Model
{
    use HasFactory;
    protected $table = 'enroll_requests';
    protected $guarded = [];

    public function Schools()
    {
        return $this->belongsToMany(School::class);
    }
}
