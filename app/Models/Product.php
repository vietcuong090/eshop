<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['img', 'name', 'description', 'price', 'quantity', 'category_id'];

    public function category()
    {
        // bảng nhiều qua bảng ít là belongsto
        return $this->belongsTo(Category::class);
    }
    public function orderItems()
    {
        // bảng ít qua bảng nhiều là hasmany
        return $this->hasMany(OrderItem::class);
    }
}
