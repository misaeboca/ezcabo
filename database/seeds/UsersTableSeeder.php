<?php
use App\Events\Inst;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        // Create admin account
        DB::table('users')->insert([
            'usertype' => 'Admin',
            'name' => 'Divine Home',            
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'image_icon' => null,
            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        
        
        DB::table('settings')->insert([
            'site_name' => 'Divine Home - Real Estate Pro',
            'site_email' => 'scriptscode7@gmail.com',
            'site_logo' => 'logo.png',
            'site_favicon' => 'favicon.png',
            'google_map_key' => 'xxxx',
            'site_description' => 'Divine Home - Real Estate Pro provide you with a quick and easy way to create a real estates site portal.',
            'site_copyright' => 'Copyright © 2018 Divine Home - Real Estate Pro. All rights reserved.',
            'footer_widget1_title' => 'About Us',
            'footer_widget1' => 'Vel fermentum ipsum. Suspendisse quis molestie odio. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque aliquet a metus in aliquet. Praesent ut turpis posuere, commodo odio id, ornare tortor',
            'footer_widget2_title' => 'Follow Us',
            'footer_widget2' => '<img src=\"http://scriptscode7.com/follow.jpg\" width=\"325\"/>',
            'footer_widget3_title' => 'Get In Touch',
            'footer_widget3' => '<ul class=\"contact-info\">
            <li><i class=\"fa fa-map-marker\"></i>Real estate script.
9.5 Main Street, CA,USA</li><li class=\"phone\"><i class=\"fa fa-phone\"></i>+62-3456-78910</li>   <li><i class=\"fa fa-envelope\"></i>info@domain.com</li></ul>',
            'all_properties_layout' => 'grid',
            'map_latitude' => '37.090240',
            'map_longitude' => '-95.712891',
            'home_properties_layout' => 'slider',
            'featured_properties_layout' => 'rows',
            'sale_properties_layout' => 'grid_side',
            'rent_properties_layout' => 'rows',
            'contact_lat' => '38.493744',
            'contact_long' => '-122.456286',
            'contact_us_title' => 'Contact Us',
            'contact_us_email' => 'info@example.com',
            'contact_us_phone' => '+62-3456-78910',
            'contact_us_address' => 'Real estate script. 9.5 Main Street, CA,USA',
            'about_us_title' => 'About Us',
            'currency_sign' => '$',
            'stripe_currency' => 'USD',
            'featured_property_price' => '10'
        ]);
 
        //Types set

        DB::table('property_types')->insert([
            'types' => 'Apartment',
            'slug' => 'apartment'
        ]);

        DB::table('property_types')->insert([
            'types' => 'Commercial',
            'slug' => 'commercial'
        ]);

        DB::table('property_types')->insert([
            'types' => 'House Villa',
            'slug' => 'house-villa'
        ]);

        DB::table('property_types')->insert([
            'types' => 'Individual House',
            'slug' => 'individual-house'
        ]);

        DB::table('property_types')->insert([
            'types' => 'Land',
            'slug' => 'land'
        ]);

        //Types set
        
        DB::table('slider')->insert([
            'slider_title' => 'Slider 1',
            'slider_text1' => 'Vacation Rental',
            'slider_text2' => 'in San Francisco',
            'image_name' => 'slider-1-909481380b44adce572e160b5019c2c9'
        ]);

        DB::table('slider')->insert([
            'slider_title' => 'Slider 2',
            'slider_text1' => 'Luxury Apartment',
            'slider_text2' => 'in New York',
            'image_name' => 'slider-1-3393cfddb0e497749d7242a9c0269301'
        ]);

        DB::table('slider')->insert([
            'slider_title' => 'Slider 3',
            'slider_text1' => 'Family House',
            'slider_text2' => 'in Miami',
            'image_name' => 'slider-3-e2377e7ba15750b6ff3819ff38f5909c'
        ]);

    }
}
