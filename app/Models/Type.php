<?php


namespace Chatty\Models;

use Illuminate\Database\Eloquent\Model;


class Type extends Model
{


    // define the table name
    protected $table = 'tbl_types';


    // which fields can be updated?
    protected $fillable = [
    	'name', 'icon','slug'
    ];


    public function services() {
       return $this->hasMany('Chatty\Models\Service', 'service_id');
   }

}
