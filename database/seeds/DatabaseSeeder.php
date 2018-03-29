<?php

use Illuminate\Database\Seeder;

use App\Todo;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('TodoTableSeeder');

        $this->command->info('User table seeded!');
    }
}

class TodoTableSeeder extends Seeder {

    public function run()
    {
        DB::table('todos')->delete();

        Todo::create(
            [
                'title' => 'Todo sample maken (Laravel)'
            ]
            );
        Todo::create(
            [
                'title' => 'Todo sample maken (Client)'
            ]
            );
        Todo::create(
            [
                'title' => 'Todo sample uitleg/presentatie'
            ]
            );
        Todo::create(
            [
                'title' => 'Todo sample voorbereiden'
            ]
            );            
    }

}
