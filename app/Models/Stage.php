<?php

namespace App\Models;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
