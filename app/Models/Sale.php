<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $fillable = [
        'user_id',
        'client_id',
        'invoice_number',
        'nit',
        'name',
        'sale_date',
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Client()
    {
        return $this->belongsTo(Client::class);
    }
    public function Details()
    {
        return $this->hasMany(Detail::class);
    }
    public function Products()
    {
        return $this->belongsToMany(Product::class,'details');
    }
}
