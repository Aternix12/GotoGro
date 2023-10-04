<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'CategoryID';
    protected $fillable = ['CategoryName'];

    public function groceryItems()
    {
        return $this->hasMany(GroceryItem::class, 'CategoryID');
    }
}
