<?php

use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \LaravelForm\Channel::create([
            'name'=>'Laravel 5.8',
            'slug'=>str_slug('Laravel 5.8')

        ]);
        \LaravelForm\Channel::create([
            'name'=>'Vue js 3',
            'slug'=>str_slug('Vue js 3')

        ]);
        \LaravelForm\Channel::create([
            'name'=>'Angular 7',
            'slug'=>str_slug('Angular 7')

        ]);
        \LaravelForm\Channel::create([
            'name'=>'Node js',
            'slug'=>str_slug('Node js')

        ]);
    }
}
