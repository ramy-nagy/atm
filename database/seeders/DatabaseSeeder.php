<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $users = [
            [
                'name' => 'Ramy',
                'role' => 'admin',
                'account_id' => '63431',
                'email' => 'admin@atm.com',
                'is_admin' => '1',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Sara',
                'account_id' => '60515',
                'email' => 'user@atm.com',
                'is_admin' => '0',
                'password' => bcrypt('123456'),
            ],
        ];

        $categories = [
            [
                'name' => 'withdraw',
            ],
            [
                'name' => 'deposit',
            ],
        ];
        foreach ($users as $key => $user) {
            User::create($user);
        }
        foreach ($categories as $key => $Category) {
            Category::create($Category);
        }
    }
}
