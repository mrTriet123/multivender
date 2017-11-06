<?php

use Illuminate\Database\Seeder;

class ReplyContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('reply_contacts')->insert([
        	[
		        'contact_message_id' => '1',
		        'content' => 'ok check',
        	],

        	[
		        'contact_message_id' => '2',
		        'content' => 'ok check',
        	]
        ]);
    }
}
