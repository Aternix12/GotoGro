<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesTransaction extends Model
{
    protected $table = 'sales_transactions';
    protected $primaryKey = 'TransactionID';
    public $timestamps = false;

    /**
     * Get the member that owns the sales transaction.
     */
    public function member()
    {
        return $this->belongsTo(Member::class, 'MemberID', 'MemberID');
    }

    /**
     * Get the order status that owns the sales transaction.
     */
    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class, 'OrderStatusID', 'OrderStatusID');
    }
    use HasFactory;
}
