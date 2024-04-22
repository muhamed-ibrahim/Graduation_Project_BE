<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'birthdate',
        'parent_id',
        'gender',
        'childbirth_certificate',
        'school_id'
        ];

    public function parent(){
        return $this->belongsTo(User::class);
    }

    public function school(){
        return $this->belongsTo(School::class);
    }

    // getter for image
    public function getImageAttribute($value)
    {
        return asset('storage/children/' . $value);
    }

    // getter for childbirth_certificate
    public function getChildbirthCertificateAttribute($value)
    {
        return asset('storage/children/' . $value);
    }
}
