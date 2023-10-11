<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;

    protected $table = 'transaction_items';  // Define the table name

    protected $fillable = [
        'TransactionID',
        'GroceryID',
        'Quantity'
    ];

    /**
     * Get the transaction that owns the transaction item.
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'TransactionID', 'id');
    }

    /**
     * Get the grocery item that this transaction item refers to.
     */
    public function groceryItem()
    {
        return $this->belongsTo(GroceryItem::class, 'GroceryID', 'GroceryID');
    }
}
