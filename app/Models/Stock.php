<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Stock extends Model
{
protected $fillable = ['id_products', 'type', 'quantity'];
public function product()
{
return $this->belongsTo(Product::class, 'id_products');
}
}