<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UserDetailsSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 4; $i++) {
            $avatar = null;
            if($i === 0) {
                $firstName = 'Andrew';
                $lastName = 'Nite';
                $bio = "Let's see, What about me? Well, I'm half-past-crazy and from the North. But on a serious note, ha, web development is definitely my jam. Been doing it for about 15 years now. Wow, that makes me feel old. Were the 90s and 2000's really that long ago. I could've sworn just last summer I was the Emperor of The Backyard. Ruling with my domain with my Incredible Storm 2000 Water Gun. Bwa-ha-ha! And if you thought you'd catch me you better be able to keep up when I'm on my Synergy Rollerblades. Anyway, Hey who it goin?";
                $avatar = 'uploads/user-icon.png';
                $cover = 'uploads/cover.webp';
                
            } elseif ($i === 1) {
                $firstName = 'Adrian';
                $lastName = 'Garber';
                $bio = $faker->text(500);
                $avatar = 'uploads/user-icon.png';
                $cover = null;
            } elseif ($i === 2) {
                $firstName = 'That';
                $lastName = 'Guy';
                $bio = $faker->text(500);
                $avatar = 'uploads/user-icon.png';
                $cover = null;
            } else {
                // $firstName = $faker->firstName;
                // $lastName = $faker->lastName;
                $firstName = 'That';
                $lastName = 'Girl';
                $bio = $faker->text(500);
                $avatar = 'uploads/user-icon.png';
                $cover = null;
            }

            $detailData = [
                'user_id' => $i + 1,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'bio'        => $bio, 
                'phone' => $faker->phoneNumber,
                'organization' => $faker->company,
                'address1' => $faker->streetAddress,
                'address2' => $faker->secondaryAddress,
                'city' => $faker->city,
                'state' => $faker->state,
                'zip' => $faker->postcode,
                'avatar' => $avatar,
                'cover_image' => $cover,
                // ... other fields from your user_details table
            ];
            // Use Query Builder if no dedicated model exists for user_details
            $this->db->query('SET FOREIGN_KEY_CHECKS=0;');
            // Use Query Builder if no dedicated model exists for user_details
            $this->db->table('user_details')->insertBatch($detailData);
            $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
