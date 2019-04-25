<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('files', function(Blueprint $table) {
            if (!Schema::hasColumn('files', 'folder_id')) {
                $table->integer('folder_id')->unsigned()->nullable();
                $table->foreign('folder_id')->references('id')->on('folders')->onDelete('cascade');}
                
                if (!Schema::hasColumn('files', 'user_id')) {
                $table->integer('user_id')->unsigned()->nullable();
               $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           }
                
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
    }
}
