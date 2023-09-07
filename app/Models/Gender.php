<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $primaryKey = 'GenderID';
    public $timestamps = false;

    public function members()
    {
        return $this->hasMany(Member::class, 'GenderID', 'GenderID');
    }
    use HasFactory;
}
