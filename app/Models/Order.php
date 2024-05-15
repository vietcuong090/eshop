<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'status', 'user_id'];
    // Model relationship
    public function user()
    {
        return $this->belongsTo(User::class); // (Product::class) giúp Eloquent biết rằng mối quan hệ này sẽ liên kết với bảng nào.
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
        // return $this->hasMany(Product::class),'categories_id'; categories_id 
        // nếu đặt ko đúng quy chuẩn thì
        // phải chỉ rỏ khoá ngoại 

    }
}
