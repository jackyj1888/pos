<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'Clients';
    protected $fillable = [
        'name',
        'last_name',
        'birth_date',
        'nit',
    ];
    public function Sales()
    {
        return $this->hasMany(Sale::class);
    }
    public function Contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
