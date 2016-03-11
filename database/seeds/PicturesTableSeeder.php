<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PicturesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Model::unguard();

        $pictures = [
            [
                'name' => 'Kim',
                'file' => 'kim.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Maarten',
                'file' => 'maarten.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Sam',
                'file' => 'sam.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        foreach ($pictures as $picture) {
            DB::table('pictures')->insert($picture);
        }

        Model::reguard();
    }
}
