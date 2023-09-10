<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroceryItem extends Model
{
    protected $table = 'grocery_items';
    protected $primaryKey = 'GroceryID';
    public $timestamps = false;
    protected $fillable = [
        'ProductName', 'Stock', 'Price', 'Location'
    ];

    use HasFactory;
}
