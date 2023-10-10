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
        'ProductName', 'Stock', 'Price', 'CategoryID', 'DepartmentID'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryID');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'DepartmentID');
    }
    use HasFactory;
}
