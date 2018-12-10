<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->length(11);
            $table->integer('featured_property')->length(1)->default(0);
            $table->string('property_name'); 
            $table->string('property_slug')->nullable();
            $table->string('property_type');
            $table->string('property_purpose'); 
            $table->string('price'); 
            $table->text('address');
            $table->string('map_latitude')->nullable();
            $table->string('map_longitude')->nullable();
            $table->string('bathrooms')->nullable();
            $table->string('bedrooms')->nullable();
            $table->string('garage')->nullable();
            $table->string('land_area')->nullable();
            $table->string('build_area')->nullable();
            $table->longtext('description');
            $table->text('property_features')->nullable();            
            $table->string('featured_image');
            $table->string('floor_plan')->nullable();
            $table->text('video_code')->nullable();             
            $table->integer('status')->length(1)->default(0);
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
        Schema::dropIfExists('properties');
    }
}
