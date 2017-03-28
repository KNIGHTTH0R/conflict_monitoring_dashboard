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
            $table->timestamps();
        });

        Schema::create("monitors_pages_relations",function (Blueprint $table){
            $table->integer("monitor_id");
            $table->integer("page_id");
        });        

        Schema::create("monitors_websites_relations",function (Blueprint $table){
            $table->integer("monitor_id");
            $table->integer("website_id");
        });        

        Schema::create("monitors_special_pages_relations",function (Blueprint $table){
            $table->integer("monitor_id");
            $table->integer("page_id");
        });        

        Schema::create("monitors_special_websites_relations",function (Blueprint $table){
            $table->integer("monitor_id");
            $table->integer("website_id");
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
        Schema::dropIfExists('monitors_pages_relations');
        Schema::dropIfExists('monitors_websites_relations');
        Schema::dropIfExists('monitors_special_pages_relations');
        Schema::dropIfExists('monitors_special_websites_relations');
    }
}
