<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'Products';
    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'price',
        'stock',
    ] ;


public function category()
{
    return $this->belongsTo(Category::class);
}

}
