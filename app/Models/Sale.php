<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table = 'Sales';
    protected $fillable = [
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
}
