<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $primaryKey = 'DepartmentID';
    public $timestamps = false;
    protected $fillable = ['DepartmentName'];

    public function groceryItems()
    {
        return $this->hasMany(GroceryItem::class, 'DepartmentID');
    }
}
