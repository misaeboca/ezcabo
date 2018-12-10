<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');                 
            $table->string('site_name');
            $table->string('site_email');
            $table->string('site_logo');
            $table->string('site_favicon');
            $table->string('google_map_key');
            $table->integer('recaptcha')->length(1)->default(0);
            $table->string('site_description')->nullable();
            $table->text('site_keywords')->nullable();
            $table->text('site_header_code')->nullable();
            $table->text('site_footer_code')->nullable();
            $table->string('site_copyright')->nullable();
            $table->string('footer_widget1_title')->nullable();
            $table->text('footer_widget1')->nullable();
            $table->string('footer_widget2_title')->nullable();
            $table->text('footer_widget2')->nullable();
            $table->string('footer_widget3_title')->nullable();
            $table->text('footer_widget3')->nullable();
            $table->string('title_bg')->nullable();
            $table->string('all_properties_layout')->nullable();
            $table->string('map_latitude')->nullable();
            $table->string('map_longitude')->nullable();
            $table->string('home_properties_layout')->nullable();
            $table->string('featured_properties_layout')->nullable();
            $table->string('sale_properties_layout')->nullable();
            $table->string('rent_properties_layout')->nullable();
            $table->string('pagination_limit')->length(3)->default(12);
            $table->text('addthis_share_code')->nullable();
            $table->text('disqus_comment_code')->nullable();
            $table->string('social_facebook')->nullable();
            $table->string('social_twitter')->nullable();
            $table->string('social_linkedin')->nullable();
            $table->string('social_gplus')->nullable();
            $table->string('about_us_title')->nullable();            
            $table->text('about_us_description')->nullable();
            $table->string('contact_lat')->nullable();
            $table->string('contact_long')->nullable();
            $table->string('contact_us_title')->nullable();
            $table->string('contact_us_email')->nullable();
            $table->string('contact_us_phone')->nullable();
            $table->string('contact_us_address')->nullable();
            $table->string('terms_conditions_title')->nullable();
            $table->text('terms_conditions_description')->nullable();
            $table->string('privacy_policy_title')->nullable(); 
            $table->text('privacy_policy_description')->nullable();
            $table->string('currency_sign')->nullable();
            $table->string('stripe_currency')->nullable();
            $table->float('featured_property_price', 11, 2)->nullable();
            $table->text('bank_payment_details')->nullable();
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
