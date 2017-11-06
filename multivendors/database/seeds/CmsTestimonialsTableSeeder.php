<?php

use Illuminate\Database\Seeder;

class CmsTestimonialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cms_testimonials')->insert([
        	[
		        'name' => 'User 1',
		        'location' => 'Asia Pacific Division',
		        'image' => 'testi_1.jpg',
		        'text' => 'Proin pharetra suscipit volutpat. Nulla facilisi. Suspendisse ligula libero, blandit non massa vel, ultrices luctus elit. Nam ultrices rhoncus rhoncus. Morbi faucibus mauris eget condimentum ornare. Aenean faucibus, enim vel porttitor malesuada, lorem nunc tristique felis, nec scelerisque odio risus in lectus. In hac habitasse platea dictumst. Sed a est ipsum. 
'
        	],

        	[
		        'name' => 'User 2',
		        'location' => 'New Delhi, IND',
		        'image' => 'testi_2.jpg',
		        'text' => 'Fusce nec posuere felis. Nam vitae rutrum justo. Sed fringilla magna metus, nec lacinia nisi porttitor sed. Nullam ut fermentum nibh, et condimentum magna. Quisque porttitor ut sem id posuere. Aliquam sollicitudin ultrices augue quis imperdiet. Aliquam erat volutpat. Praesent eu quam ut eros tincidunt auctor.'
        	],

        	[
		        'name' => 'User 3',
		        'location' => 'Gurgaon, IND',
		        'image' => 'testi_3.jpg',
		        'text' => 'Aenean sagittis lorem ut laoreet ullamcorper. Nunc tincidunt, erat vitae dapibus hendrerit, diam arcu lacinia neque, eget blandit mi odio vitae tellus.'
        	],

        	[
		        'name' => 'User 4',
		        'location' => 'Los Angeles, CA',
		        'image' => 'testi_4.jpg',
		        'text' => 'Our project implementation and transition was quite smooth. Quatrro always responded well whenever there was an issue to be sorted out.Our project implementation and transition was quite smooth. Quatrro always responded well whenever there was an issue to be sorted out.'
        	],

        	[
		        'name' => 'User 5',
		        'location' => 'Da Nang, VN',
		        'image' => 'testi_5.jpg',
		        'text' => 'The Best Shopping Experience. Very informative and buy what you see is best facility!!!'
        	],
        	
        ]);
    }
}
