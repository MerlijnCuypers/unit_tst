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
                'id' => '2',
                'name' => 'Kim',
                'file' => 'kim.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => '4',
                'name' => 'Maarten',
                'file' => 'maarten.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => '5',
                'name' => 'Sam',
                'file' => 'sam.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => '7',
                'name' => 'Jonas',
                'file' => 'jonas.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => '8',
                'name' => 'Rias',
                'file' => 'rias.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => '10',
                'name' => 'Seeger',
                'file' => 'seeger.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => '11',
                'name' => 'Sidney',
                'file' => 'sidney.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => '12',
                'name' => 'Simon',
                'file' => 'simon.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => '14',
                'name' => 'Thomas',
                'file' => 'thomas.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => '15',
                'name' => 'Merlijn',
                'file' => 'merlijn.jpg',
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
