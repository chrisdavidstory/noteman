<?php

use Illuminate\Database\Seeder;
use App\User;
use Webpatser\Uuid\Uuid;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create test account
        DB::table('users')->insert([
            'name'          => 'test',
            'email'         => 'test@test.com',
            'password'      => '$2y$10$Q7hi.IQlFFY3A96BJveDtOPQ9Nf40i2Vf4QV0g8IoDYA8RZtgTD06',
            'api_key'       => Uuid::generate(4),
            'updated_at'    => '2015-10-12 02:40:15',
            'created_at'    => '2015-10-12 02:40:15'
        ]);
        
        // and a few more 
        factory(User::class, 9)->create();
    }
}
