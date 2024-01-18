<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(CategoryTableSeeder::class);
        $this->command->info('Таблица категорий загружена данными!');

        $this->call(TagTableSeeder::class);
        $this->command->info('Таблица тегов загружена данными!');
        
        $this->call(ArticleTableSeeder::class);
        $this->command->info('Таблица статей загружена данными!');

        $this->call(ServiceTableSeeder::class);
        $this->command->info('Таблица услуг загружена данными!');

        $this->call(ArticleTagTableSeeder::class);
        $this->command->info('Таблица статья-тег загружена данными!');

        $this->call(PermissionsDemoSeeder::class);
        $this->command->info('Таблица с правами загружена данными!');
    }
}
