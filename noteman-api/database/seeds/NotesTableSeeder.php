<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Note;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create ten random notes for each user in the system

        foreach(User::all() as $user ) {
            factory(Note::class, 10)->create(['user_id' => $user->id]);
        }

    }
}
