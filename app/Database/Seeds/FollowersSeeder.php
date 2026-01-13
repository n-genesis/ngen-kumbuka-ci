<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use PHPUnit\Event\Facade;

class FollowersSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        $appConfig = config('App');// Get App config file values

        $followersList = [
            'follower_id' => 2,
            'followed_id' => 1,
            'status' => 'accepted',
            'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),

        ];

        $this->db->table('followers')->insertBatch($followersList);
    }
}
