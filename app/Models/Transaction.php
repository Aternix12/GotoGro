<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionOrder extends Model
{
    protected $table = 'transaction_orders';
    protected $primaryKey = ['TransactionID', 'GroceryID'];
    public $incrementing = false;
    public $timestamps = false;

    /**
     * Get the sales transaction that owns the transaction order.
     */
    public function salesTransaction()
    {
        return $this->belongsTo(SalesTransaction::class, 'TransactionID', 'TransactionID');
    }

    /**
     * Get the grocery item that owns the transaction order.
     */
    public function groceryItem()
    {
        return $this->belongsTo(GroceryItem::class, 'GroceryID', 'GroceryID');
    }
    use HasFactory;
}
