<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //setting jika primary key tidak default [id] dan setting jika primary_key bukan integer
    protected $primaryKey = 'id_product'; 
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id_product','nama_product','harga_product'];
}
