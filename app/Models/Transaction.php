<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_xendit','external_id','product_id','name','email','email','nohp','gambar','pesan','status'];
    
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id_product');
    }
}
