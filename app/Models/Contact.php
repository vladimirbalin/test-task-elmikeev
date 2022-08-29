<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function leads()
    {
        return $this->belongsToMany('leads');
    }
    public function company()
    {
        return $this->hasOne('companies');
    }
}
