<?php

use Illuminate\Database\Seeder;

class ShopManagementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('shops_management')->insert([
        	[
		        'user_id' => '4',
		        'name' => 'Monacosmetics',
		        'slug' => 'monacosmetics',
		        'active' => 'Yes',
		        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
		        'logo' => 'logo_1.jpg',
		        'banner' => 'banner_1.jpg',
		        'featured_shop' => 'Yes',
		        'country_id' => '231',
		        'state_id' => '3919',
		        'phone' => '1800-000-123',
		        'address' => '# Address Line 1',
		        'city' => 'Y City',
		        'postcode' => '57483',
		        'payment_policy' => '',
		        'delivery_policy' => '',
		        'refund_policy' => '',
		        'additional_information' => '',
		        'seller_information' => '',
		        'meta_tag_title' => '',
		        'meta_tag_keywords' => '',
		        'meta_tag_description' => '',
        	],
        	[
		        'user_id' => '5',
		        'name' => 'Homestore',
		        'slug' => 'homestore',
		        'active' => 'Yes',
		        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
		        'logo' => 'logo_2.jpg',
		        'banner' => 'banner_2.jpg',
		        'featured_shop' => 'Yes',
		        'country_id' => '231',
		        'state_id' => '3920',
		        'phone' => '1800-000-123',
		        'address' => '# Address Line 1',
		        'city' => 'Y City',
		        'postcode' => '57483',
		        'payment_policy' => '',
		        'delivery_policy' => '',
		        'refund_policy' => '',
		        'additional_information' => '',
		        'seller_information' => '',
		        'meta_tag_title' => '',
		        'meta_tag_keywords' => '',
		        'meta_tag_description' => '',
        	],
        	[
		        'user_id' => '6',
		        'name' => 'BestWomenStore',
		        'slug' => 'bestwomenstore',
		        'active' => 'Yes',
		        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
		        'logo' => 'logo_3.jpg',
		        'banner' => 'banner_3.jpg',
		        'featured_shop' => 'No',
		        'country_id' => '231',
		        'state_id' => '3921',
		        'phone' => '1800-000-123',
		        'address' => '# Address Line 1',
		        'city' => 'Y City',
		        'postcode' => '57483',
		        'payment_policy' => '',
		        'delivery_policy' => '',
		        'refund_policy' => '',
		        'additional_information' => '',
		        'seller_information' => '',
		        'meta_tag_title' => '',
		        'meta_tag_keywords' => '',
		        'meta_tag_description' => '',
        	],
        	[
		        'user_id' => '7',
		        'name' => 'BestMenStore',
		        'slug' => 'bestmenstore',
		        'active' => 'No',
		        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
		        'logo' => 'logo_4.jpg',
		        'banner' => 'banner_4.jpg',
		        'featured_shop' => 'No',
		        'country_id' => '231',
		        'state_id' => '3922',
		        'phone' => '1800-000-123',
		        'address' => '# Address Line 1',
		        'city' => 'Y City',
		        'postcode' => '57483',
		        'payment_policy' => '',
		        'delivery_policy' => '',
		        'refund_policy' => '',
		        'additional_information' => '',
		        'seller_information' => '',
		        'meta_tag_title' => '',
		        'meta_tag_keywords' => '',
		        'meta_tag_description' => '',
        	],
        	[
		        'user_id' => '8',
		        'name' => 'Shark',
		        'slug' => 'shark',
		        'active' => 'Yes',
		        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
		        'logo' => 'logo_5.jpg',
		        'banner' => 'banner_5.jpg',
		        'featured_shop' => 'No',
		        'country_id' => '231',
		        'state_id' => '3919',
		        'phone' => '1800-000-123',
		        'address' => '# Address Line 1',
		        'city' => 'Y City',
		        'postcode' => '57483',
		        'payment_policy' => '',
		        'delivery_policy' => '',
		        'refund_policy' => '',
		        'additional_information' => '',
		        'seller_information' => '',
		        'meta_tag_title' => '',
		        'meta_tag_keywords' => '',
		        'meta_tag_description' => '',
        	],
        	

        ]);
    }
}
