<?php

use Illuminate\Database\Seeder;

class CrawlersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        //Create example data
        for ($i = 0; $i < 50; $i++) {
            DB::table('crawlers')->insert([
                'crawler_name' => str_random(10)
            ]);
        }
    }

}
