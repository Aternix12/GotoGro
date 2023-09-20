<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salesTransaction extends Model
{
    protected $table = 'transaction_orders';
    protected $primaryKey = 'TransactionID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        ''
    ];

    /**
     * Get the sales transaction that owns the transaction order.
     */
    public function salesTransaction()
    {
        return $this->belongsTo(SalesTransaction::class, 'TransactionID', 'TransactionID');
    }

    /**
     * Get the member ID for the transaction order.
     */
    public function memberID()
    {
        return $this->belongsTo(Member::class, 'MemberID', 'MemberID');
    }

    /**
     * Get the order status
     */
    public function orderSatusID()
    {
        return $this->belongsTo(OrderStatus::class, 'OrderStatusID', 'OrderStatusID');
    }

    /**
    * Get date
     */
    public function date()
    {
        return $this->belongsTo(SalesTransaction::class, 'Date', 'Date');
    }
    
    use HasFactory;
}