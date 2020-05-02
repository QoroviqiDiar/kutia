<?php

use App\Page;
use App\User;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::find(1);

        Page::truncate();

        $admin->pages()->saveMany([
            new Page([
                'title' => 'About',
                'slug' => '/about',
                'content' => 'This is about us page.'
            ]),
            new Page([
                'title' => 'Contact',
                'slug' => '/contact',
                'content' => 'Contact us.'
            ])
        ]);
    }
}
