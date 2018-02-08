<?php
namespace comments\commentssystem;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class table_comments extends Seeder
{

    public function run()
    {

        \DB::table('comments')->insert(array(
            'name'               => 'Jhon Smith',
            'email'              => 'jhonsmith@smiths.com',
            'commentstable_id'   => 1,
            'commentstable_type' => 'blog\blogsystem\Models\Post',
            'comment'            => 'This post has change my life',
            'rating'             => 5,
            'approved'           => 1,

        ));
        \DB::table('comments')->insert(array(
            'name'               => 'Mickel Douglas',
            'email'              => 'dougli@dougly.com',
            'commentstable_id'   => 1,
            'commentstable_type' => 'blog\blogsystem\Models\Post',
            'comment'            => 'I am agree',
            'rating'             => 5,
            'approved'           => 1,

        ));
        \DB::table('comments')->insert(array(
            'name'               => 'admin',
            'email'              => 'admin@admin.com',
            'commentstable_id'   => 1,
            'commentstable_type' => 'blog\blogsystem\Models\Post',
            'comment'            => 'This is an admin repply to the comment',
            'rating'             => 3,
            'approved'           => 1,
            'parent_id'          => 1,

        ));
        \DB::table('comments')->insert(array(
            'name'               => 'Mack Jason',
            'email'              => 'Mack@jason.com',
            'commentstable_id'   => 1,
            'commentstable_type' => 'blog\blogsystem\Models\Post',
            'comment'            => 'This is my repply.',
            'rating'             => 3,
            'approved'           => 1,
            'parent_id'          => 1,

        ));

        \DB::table('comments')->insert(array(
            'name'               => 'Jhon Smith',
            'email'              => 'jhonsmith@smiths.com',
            'commentstable_id'   => 2,
            'commentstable_type' => 'blog\blogsystem\Models\Post',
            'comment'            => 'This post make me feel special.',
            'rating'             => 3,
            'approved'           => 1,

        ));
        \DB::table('comments')->insert(array(
            'name'               => 'Mickel Douglas',
            'email'              => 'dougli@dougly.com',
            'commentstable_id'   => 2,
            'commentstable_type' => 'blog\blogsystem\Models\Post',
            'comment'            => 'I am not agree',
            'rating'             => 1,
            'approved'           => 1,

        ));

        \DB::table('comments')->insert(array(
            'name'               => 'Jhon Travolta',
            'email'              => 'travoltis@travis.com',
            'commentstable_id'   => 1,
            'commentstable_type' => 'App\Models\Product',
            'comment'            => 'Oh my good, what a wonderful product',
            'rating'             => 5,
            'approved'           => 1,

        ));

        \DB::table('comments')->insert(array(
            'name'               => 'Selena Gomez',
            'email'              => 'selenita@selen.com',
            'commentstable_id'   => 1,
            'commentstable_type' => 'App\Models\Product',
            'comment'            => 'Absolutely awsome product.',
            'rating'             => 5,
            'approved'           => 1,

        ));

        \DB::table('comments')->insert(array(
            'name'               => 'Jhon Travolta',
            'email'              => 'travoltis@travis.com',
            'commentstable_id'   => 2,
            'commentstable_type' => 'App\Models\Product',
            'comment'            => 'This product is the best think I ever see',
            'rating'             => 3,
            'approved'           => 1,

        ));

        \DB::table('comments')->insert(array(
            'name'               => 'Selena Gomez',
            'email'              => 'selenita@selen.com',
            'commentstable_id'   => 2,
            'commentstable_type' => 'App\Models\Product',
            'comment'            => 'This product make me feel special.',
            'rating'             => 5,
            'approved'           => 1,

        ));

    }

}
