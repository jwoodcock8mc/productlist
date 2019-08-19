<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=['name','price','product_type_id','description','link','discounted_price'];

    public function productType()
    {
        return $this->BelongsTo('App\ProductType');
    }
}
