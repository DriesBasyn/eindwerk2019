<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'products';

    protected $fillable=['photo_id','name','title','description','price','category_id',
        'brand_id', 'created_at_ip','updated_at_ip'];

    public function brand(){
        return $this->belongsTo('App\Brand');
    }

    public function category(){
        return $this->belongsto('App\Category');
    }
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
}
