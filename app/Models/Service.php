<?php


namespace Chatty\Models;

use Illuminate\Database\Eloquent\Model;


class Service extends Model
{


    // define the table name
    protected $table = 'tbl_services';


    // which fields can be updated?
    protected $fillable = [
    	'name', 'description','charge', 'base_image','user_id','type_id'
    ];

    public function status() {
       return $this->hasOne('Chatty\Models\Status');
    }

        public function types() {
              return $this->belongsTo('Chatty\Models\Type', 'type_id');


          }
        // define the relationship with the user table
        // by joining this table's 'user_id' field with the user-table's 'id' field
        public function user()
        {
        	return $this->belongsTo('Chatty\Models\User', 'user_id');
        }




    // method to create various likes
    public function likes()
    {
        return $this->morphMany('Chatty\Models\Likeable', 'likeable');
    }

}
