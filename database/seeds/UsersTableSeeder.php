<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		$faker = Faker\Factory::create();
// 'fname', 'lname', 'email', 'password', 'company', 'img','img_url', 'address', 'mob_no', 'tel_no', 'country', 'role', 'verified', 'status', 'description'
		foreach (range(1, 105) as $index) {
			User::create([
				'fname' => 'Artist_'.$index,
				'lname' => 'Artist_'.$index,
				'slug' => 'artist_'.$index,
				'img' => null,
				'img_url' => $faker->imageUrl($width = 640, $height = 480, 'fashion'),
				'email' => 'michael@bahariweb.com',
				'password' => password_hash('admin123456', PASSWORD_BCRYPT, ['cost' => 10]),
				'img' => 'user.jpg',
				'address' => 'Ilala',
				'mob_no' => '0713414549',
				'role' => 'Admin',
				'description' => ''
			]);
		}
	}
}
