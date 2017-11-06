<?php

use Illuminate\Database\Seeder;

class ContactMessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('contact_messages')->insert([
        	[
		        'name' => 'Test 1',
		        'email' => 'test1@gmail.com',
		        'subject' => 'aaa',
		        'messages' => 'bbbbbbbbb'
        	],

        	[
		        'name' => 'Test 2',
		        'email' => 'test2@gmail.com',
		        'subject' => 'cccccc',
		        'messages' => 'dddddddddd'
        	]
        ]);
    }
}
