<?php

use Illuminate\Database\Seeder;

class CmsBannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cms_banners')->insert([
        	[
		        'title' => 'Banner 1',
		        'type_banner_id' => 1,
		        'image' => 'banner_1.jpg',
		        'html' => '',
		        'url' => 'http://www.fatbit.com',
		        'openlink' => 'yes'
        	],
        	[
		        'title' => 'Banner 2',
		        'type_banner_id' => 2,
		        'image' => '',
		        'html' => 'You may also seed your database using the migrate:refresh command, which will also rollback and re-run all of your migrations. This command is useful for completely re-building your database',
		        'url' => 'http://www.fatbit.com',
		        'openlink' => 'no'
        	],

        ]);
    }
}
