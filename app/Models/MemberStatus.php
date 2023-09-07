<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberStatus extends Model
{
    protected $primaryKey = 'MemberStatusID';
    public $timestamps = false;

    public function members()
    {
        return $this->hasMany(Member::class, 'MemberStatusID', 'MemberStatusID');
    }
    use HasFactory;
}
