<?php

use Illuminate\Database\Seeder;

class CmsFqasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cms_fqas')->insert([
        	[
		        'fqa_category_id' => 1,
		        'question' => 'How do I place an order?',
		        'description' => 'fsdf',
        	],
        	[
		        'fqa_category_id' => 1,
		        'question' => 'What is my user ID?',
		        'description' => 'fdsfsd',
        	],
        	[
		        'fqa_category_id' => 2,
		        'question' => 'How do I use the Bulk Order Pad?',
		        'description' => 'sdfsd',
        	],
        	[
		        'fqa_category_id' => 2,
		        'question' => 'What is my user ID?',
		        'description' => 'fsdf',
        	],
        	[
		        'fqa_category_id' => 3,
		        'question' => 'How do I place an order?',
		        'description' => 'fsdf',
        	],
        	[
		        'fqa_category_id' => 3,
		        'question' => 'How do I use the Bulk Order Pad?',
		        'description' => 'sdfsd',
        	],
        	[
		        'fqa_category_id' => 4,
		        'question' => 'How do I make a purchase on your Web site?',
		        'description' => 'dfs',
        	],
        	[
		        'fqa_category_id' => 4,
		        'question' => 'How do I use the Bulk Order Pad?',
		        'description' => 'sdfs',
        	],

        ]);
    }
}
