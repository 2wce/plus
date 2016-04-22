<?php


namespace Chatty\Models;

use Illuminate\Database\Eloquent\Model;


class Collection extends Model
{


    // define the table name

    protected $table = 'tbl_collections';



    // which fields can be updated?
    protected $fillable = [
    	'title','description','category','user_id','parent_id'
    ];


    // define the relationship with the user table
    // by joining this table's 'user_id' field with the user-table's 'id' field
    public function products() {

       return $this->belongsToMany('Chatty\Models\Product','tbl_collection_product');
    }


    public function user()
    {
     return $this->belongsTo('Chatty\Models\User');
    }

    public function status() {
       return $this->hasOne('Chatty\Models\Status');
    }

}
