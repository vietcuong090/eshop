<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function products()
    {
        // select * form products where category_id=id
        return $this->hasMany(Product::class); // (Product::class) giúp Eloquent biết rằng mối quan hệ này sẽ liên kết với bảng nào.
        // return $this->hasMany(Product::class),'categories_id'; categories_id nếu đặt ko đúng quy chuẩn thì
        // phải chỉ rỏ khoá ngoại 
        // hasMany là khóa ngoại, số ít
    }
}
