<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'pagseguro_code',
        'pagseguro_status',
        'items',
        'link_boleto',
        'endereco',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function shippings()
    {
        return $this->hasMany(Shipping::class);
    }
}
