<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $primaryKey = 'MemberID';
    public $timestamps = false;
    protected $fillable = [
        'FirstName', 'LastName', 'MemberStatusID',
        'DateOfBirth', 'GenderID', 'Address', 'Phone', 'Email'
    ];


    /**
     * Get the gender associated with the member.
     */
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'GenderID', 'GenderID');
    }

    /**
     * Get the member status associated with the member.
     */
    public function memberStatus()
    {
        return $this->belongsTo(MemberStatus::class, 'MemberStatusID', 'MemberStatusID');
    }

    /**
     * Get the sales transactions for the member.
     */
    public function salesTransactions()
    {
        return $this->hasMany(SalesTransaction::class, 'MemberID', 'MemberID');
    }
    use HasFactory;
}
