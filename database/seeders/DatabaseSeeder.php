<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\User;
use  App\Models\Category;
use  App\Models\Post;
use App\Models\Warga;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // User::create([
        //     'name' => 'Zidan',
        //     'email' => 'zdn@gmail.com',
        //     'password' => bcrypt('231')
        // ]);
        // User::create([
        //     'name' => 'Cindy',
        //     'email' => 'cdn@gmail.com',
        //     'password' => bcrypt('231')
        // ]);

        User::create([
            'username' => 'admin',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('ydnic'),
            'is_admin' => 1
        ]);
        User::factory(3)->create();

        Category::create([
            'name' => 'Gotong Royong',
            'slug' => 'gotong-royong'
        ]);
        
        Category::create([
            'name' => 'Berita Terkini',
            'slug' => 'berita-terkini'
        ]);
        
        Category::create([
            'name' => 'Informasi Pemerintah',
            'slug' => 'informasi-pemerintah'
        ]);

        Post::factory(20)->create();

        Warga::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
        //     'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae iure eum nihil esse accusamus laboriosam quibusdam officiis doloribus veritatis ab, nam id laudantium totam ipsam accusantium ipsum atque mollitia voluptatem. Sequi maxime facere earum enim magni quis hic corporis natus.</p> <p>Esse dolorum animi corporis possimus beatae accusantium quidem tempora voluptates aliquam illo perferendis omnis temporibus, sit delectus iste dolor iure hic neque adipisci pariatur at nobis! Minima dolorum molestias ratione explicabo veritatis tempore ab cupiditate fugiat molestiae quos provident, atque eum porro dolore. Officia nihil quibusdam cum ducimus accusantium esse expedita ipsa ullam eum, sint aut. Cumque pariatur dolore alias. </p> ',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        
        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-Kedua',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
        //     'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae iure eum nihil esse accusamus laboriosam quibusdam officiis doloribus veritatis ab, nam id laudantium totam ipsam accusantium ipsum atque mollitia voluptatem. Sequi maxime facere earum enim magni quis hic corporis natus.</p> <p>Esse dolorum animi corporis possimus beatae accusantium quidem tempora voluptates aliquam illo perferendis omnis temporibus, sit delectus iste dolor iure hic neque adipisci pariatur at nobis! Minima dolorum molestias ratione explicabo veritatis tempore ab cupiditate fugiat molestiae quos provident, atque eum porro dolore. Officia nihil quibusdam cum ducimus accusantium esse expedita ipsa ullam eum, sint aut. Cumque pariatur dolore alias. </p> ',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        
        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-Ketiga',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
        //     'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae iure eum nihil esse accusamus laboriosam quibusdam officiis doloribus veritatis ab, nam id laudantium totam ipsam accusantium ipsum atque mollitia voluptatem. Sequi maxime facere earum enim magni quis hic corporis natus.</p> <p>Esse dolorum animi corporis possimus beatae accusantium quidem tempora voluptates aliquam illo perferendis omnis temporibus, sit delectus iste dolor iure hic neque adipisci pariatur at nobis! Minima dolorum molestias ratione explicabo veritatis tempore ab cupiditate fugiat molestiae quos provident, atque eum porro dolore. Officia nihil quibusdam cum ducimus accusantium esse expedita ipsa ullam eum, sint aut. Cumque pariatur dolore alias. </p> ',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);
        
        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-Keempat',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
        //     'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae iure eum nihil esse accusamus laboriosam quibusdam officiis doloribus veritatis ab, nam id laudantium totam ipsam accusantium ipsum atque mollitia voluptatem. Sequi maxime facere earum enim magni quis hic corporis natus.</p> <p>Esse dolorum animi corporis possimus beatae accusantium quidem tempora voluptates aliquam illo perferendis omnis temporibus, sit delectus iste dolor iure hic neque adipisci pariatur at nobis! Minima dolorum molestias ratione explicabo veritatis tempore ab cupiditate fugiat molestiae quos provident, atque eum porro dolore. Officia nihil quibusdam cum ducimus accusantium esse expedita ipsa ullam eum, sint aut. Cumque pariatur dolore alias. </p> ',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

        


    }
}
