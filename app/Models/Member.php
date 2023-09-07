<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $primaryKey = 'MemberID';

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'GenderID', 'GenderID');
    }

    public function memberStatus()
    {
        return $this->belongsTo(MemberStatus::class, 'MemberStatusID', 'MemberStatusID');
    }

    public function salesTransactions()
    {
        return $this->hasMany(SalesTransaction::class, 'MemberID', 'MemberID');
    }
    use HasFactory;
}
