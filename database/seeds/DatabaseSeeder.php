<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints
        DB::table('users')->truncate();
        DB::table('categories')->truncate();
        DB::table('posts')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints
        
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
    	$this->call(PostsTableSeeder::class);
    }
}
