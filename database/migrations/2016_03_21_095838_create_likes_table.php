 <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        // create a new table
        Schema::create('tbl_likeable', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id');
            $table->integer('likeable_id'); // foreign key for 'polymorphic relationships'
            $table->string('likeable_type'); // refers to the Model of the liked item
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('tbl_likeable');
    }
}