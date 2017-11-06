<?php

use Illuminate\Database\Seeder;

class TypeBannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('type_banners')->insert([
        	[
		        'type' => 'Image',
        	],

        	[
		        'type' => 'HTML',
        	]
        ]);
    }
}
