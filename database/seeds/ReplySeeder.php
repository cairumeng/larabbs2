<?php

use App\Models\Reply;
use Illuminate\Database\Seeder;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $replies = factory(Reply::class)->times(1500)->make();
        Reply::insert($replies->toArray());
    }
}
