<?php


namespace Chatty\Plus\Products;
use Illuminate\Database\Eloquent\Model;


class Product extends Model {


    // define the table name
    protected $table = 'tbl_products';

    // which fields can be updated?
    protected $fillable = [
    	'product_name', 'product_description','price', 'base_image','user_id','category_id','cond'
    ];


    public function categories() {
        return $this->belongsTo('Chatty\Plus\Categories\Category', 'category_id');
    }

    public function collections() {
        return $this->belongsToMany('Chatty\Plus\Collections\Collection','tbl_collection_product');
    }


    public function status() {
       return $this->hasOne('Chatty\Plus\Statuses\Status');
    }

    public function images() {
       return $this->hasMany('Chatty\Plus\Images\Image');
    }
    // define the relationship with the user table
    // by joining this table's 'user_id' field with the user-table's 'id' field
    public function user()
    {
    	return $this->belongsTo('Chatty\Plus\Users\User');
    }

    public function getUser($id)
    {
        return Product::find(1)->user_id;
    }

    // method to create various likes
    public function likes()
    {
        return $this->morphMany('Chatty\Plus\Likeables\Likeable', 'likeable');
    }

}
