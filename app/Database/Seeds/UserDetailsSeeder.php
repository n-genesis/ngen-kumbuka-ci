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
                $avatar = 'uploads/ag_avatar_bl.jpg';
                $cover = 'uploads/profile.jpg';
            } elseif ($i === 2) {
                $firstName = 'Demo';
                $lastName = 'User';
                $bio = "Meet the new user, a certified Professional Bubble Wrap Popper and amateur turtle whisperer. they've spent twelve long years in corporate accounting before realizing his true calling was the satisfying 'pop' of low-density polyethylene. They now hold three unofficial world records for synchronized popping and claims he can identify a bubble wrap's country of origin just by its pitch. When they're is not actively decompressing plastic sheets, they train the highly uncooperative box turtles for the annual neighborhood slow-crawl championships. He lives in a house made of cardboard boxes with his roommate, a moody iguana named Sir Fluffington. There goal is to make edible wallpaper tasting like soup!!";
                $avatar = 'uploads/user-icon.png';
                $cover = null;
            } else {
                $firstName = 'Penelope';
                $lastName = 'Potts';
                $bio = "Penelope Potts is an Olympic-level competitive napper who has turned sleeping into a highly aggressive performance art. She regularly trains by drinking massive amounts of warm milk and staring at spreadsheets until her eyelids grow heavy. Penelope specializes in the 'accidental zoom meeting snooze' and the 'standing up on a crowded subway drift.' Her dedication to the craft has earned her sponsorship deals with three major pajama manufacturers and a local coffee shop that pays her to stay away. When she is awake, which is rare, she manages a thriving online business selling tiny hand-knitted sweaters specifically designed for garden snails. She hopes to someday nap on all seven continents!!";
                $avatar = 'uploads/avatar-icon7-.webp';
                $cover = null;
            }

            $detailData = [
                'user_id' => $i + 1,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'bio'        => $bio, 
                'phone' => '(555) 555-5555',
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
