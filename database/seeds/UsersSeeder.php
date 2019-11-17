<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $domenii = array(
            'IT',
            'Marketing',
            'Vanzari'
        );
        for($i=0; $i<=100; $i++):
            $ranKey = array_rand($domenii);
            DB::table('users')
                ->insert([
                    'name' => $faker->name,
                    'email' => $faker->unique()->email,
                    'password'=> $faker->password,
                    'avatar' => $faker->imageUrl(),
                    'nrtel' => $faker->phoneNumber,
                    'varsta' => $faker->numberBetween(18, 60),
                    'descriere' => $faker->paragraph(2),
                    'facultate' => $faker->company,
                    'domeniu' => $domenii[$ranKey]
                ]);
        endfor;
    }
}
