<?php
namespace comments\commentssystem;

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{

    public function run()
    {
        $this->call(table_comments::class);


    }
}
