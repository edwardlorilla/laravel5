<?php

use Illuminate\Database\Seeder;

class TimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('times')->insert(
            [
                [
                    'title' => "Meeting",
                    'dateStart' => "09:30",
                    'dateEnd' => "10:30",
                    'detail' => "Metting (German: Mettingen) is a commune in the Moselle department in Grand Est in north-eastern France."

                ],

                [
                    'title' => 'Metting',
                    'dateStart' => '11:30',
                    'dateEnd' => '13:50',
                    'detail' => 'Metting (German: Mettingen) is a commune in the Moselle department in Grand Est in north-eastern France.'
                ],
                [
                    'title' => 'Metting',
                    'dateStart' => '10:30',
                    'dateEnd' => '12:00',
                    'detail' => 'Metting (German: Mettingen) is a commune in the Moselle department in Grand Est in north-eastern France.'
                ],
                [
                    'title' => 'Metting',
                    'dateStart' => '12:30',
                    'dateEnd' => '14:50',
                    'detail' => 'Metting (German: Mettingen) is a commune in the Moselle department in Grand Est in north-eastern France.'
                ],
                [
                    'title' => 'Metting',
                    'dateStart' => '12:30',
                    'dateEnd' => '13:30',
                    'detail' => 'Metting (German: Mettingen) is a commune in the Moselle department in Grand Est in north-eastern France.'
                ],
                [
                    'title' => 'Metting',
                    'dateStart' => '15:30',
                    'dateEnd' => '16:50',
                    'detail' => 'Metting (German: Mettingen) is a commune in the Moselle department in Grand Est in north-eastern France.'
                ],
                [
                    'title' =>'Metting',
                    'dateStart' => '9:50',
                    'dateEnd' => '16:50',
                    'detail' => 'Metting (German: Mettingen) is a commune in the Moselle department in Grand Est in north-eastern France.'
                ],
                [
                    'title' =>'Metting',
                    'dateStart' => '11:30',
                    'dateEnd' => '13:30',
                    'detail' => 'Metting (German: Mettingen) is a commune in the Moselle department in Grand Est in north-eastern France.'
                ],
                [
                    'title' =>'Metting',
                    'dateStart' => '14:30',
                    'dateEnd' => '15:50',
                    'detail' => 'Metting (German: Mettingen) is a commune in the Moselle department in Grand Est in north-eastern France.'
                ]
        ]);
    }
}
