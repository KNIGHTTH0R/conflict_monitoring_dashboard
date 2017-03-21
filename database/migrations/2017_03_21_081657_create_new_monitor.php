<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewMonitor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('user_id');
            $table->date('from_time');
            $table->date('to_time');
            $table->text('keywords');
            $table->integer('page_id');
            $table->integer('website_id');
            $table->integer('special_page_id');
            $table->integer('special_website_id');
            $table->timestamps();
        });

        Schema::create('facebook_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page_id');
            $table->mediumText('page_name');
            $table->integer('category_id');            
            $table->timestamps();
        });        

        Schema::create('websites', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('address');
            $table->integer('category_id');  
            $table->timestamps();
        });       

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');  
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
        Schema::dropIfExists('monitors');
        Schema::dropIfExists('facebook_pages');
        Schema::dropIfExists('websites');
        Schema::dropIfExists('categories');
    }
}
