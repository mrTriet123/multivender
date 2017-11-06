<?php

use Illuminate\Database\Seeder;

class CmsPagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cms_pages')->insert([
        	[
		        'title' => 'About Us',
		        'urlkey' => 'about-us',
		        'content' => 'Founded in 2002 and At vero eos et accusamus et iusto odio dignissimos ducimus qui ',
        	],

        	[
		        'title' => 'How it works',
		        'urlkey' => 'how-it-works',
		        'content' => 'At vero eos et accusamus',
        	],

        	[
		        'title' => 'What is Yokart',
		        'urlkey' => 'what-is-yokart',
		        'content' => 'What is Yokart - Page content will go here.',
        	],

        	[
		        'title' => 'Privacy Policy',
		        'urlkey' => 'privacy-policy',
		        'content' => 'Privacy policy page content will go here',
        	],
        ]);
    }
}
