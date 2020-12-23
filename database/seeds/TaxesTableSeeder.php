<?php

use Illuminate\Database\Seeder;

class TaxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taxes')->insert([
            /**3% 1989-04-01~1997-03-31*/
            [
                'id' => 1,
                'percentage' => 3,
                'from' => date('1989-04-01')
            ],

            /**5% 1997-04-01~2014-03-31*/
            [
                'id' => 2,
                'percentage' => 5,
                'from' => date('1997-04-01')
            ],

            /**8% 2014-04-01~2019-09-30*/
            [
                'id' => 3,
                'percentage' => 8,
                'from' => date('2014-04-01')
            ],

            /**10% 2019-10-01~現在*/
            [
                'id' => 4,
                'percentage' => 10,
                'from' => date('2019-10-01')
            ],
        ]);
    }
}
