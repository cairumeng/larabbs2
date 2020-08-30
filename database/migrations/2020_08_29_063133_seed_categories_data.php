<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $now = Carbon::now();
        $categories = [
            [
                'name' => 'Share',
                'description' => 'Share creations, share discoveries',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Course',
                'description' => 'Developpement skills, pacakages',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Q&A',
                'description' => 'Keep polite, help each other',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Annoncement',
                'description' => 'Sit Annoncements',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ];
        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
