<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class NotesSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        $notesData = [
            [
                'id' => 1,
                'user_id' => 1,
                'slug' => 'the-clockmakers-compass',
                'title' => 'The Clockmaker’s Compass',
                'priority' => '#00396B',
                'body' => "<p>The rain in Oakhaven never just fell; it whispered. For forty years, Alistair Vance had ignored those whispers, keeping his eyes locked tightly on the intricate gears of the pocket watches he repaired. His shop smelled of brass polish, dried lavender, and old paper. He liked things that followed a precise, predictable rhythm.</p>
<p>Everything changed on a damp Tuesday afternoon when a young woman in a drenched trench coat left a peculiar brass compass on his counter. Before Alistair could call out to her, she vanished into the thick fog.</p>
<p>Unlike a normal compass, this one didn't point north. Its single, silver needle spun erratically whenever Alistair felt anxious, but slowed down to point directly at a hidden brick wall behind his own workbench whenever he breathed deeply. Intrigued, Alistair grabbed a hammer and carefully pried away the loose mortar.</p>
<p>Behind the wall sat a dust-covered iron box. Inside was a leather-bound journal written in his own handwriting—dated exactly thirty years into the future. The very first line read: “Alistair, if you are reading this, it means she finally brought you the compass. Do not trust the grandfather clock in the town square. It is not counting time; it is stealing it.”</p>
<p>As the town clock began to chime five o'clock, the echoes sounded heavier than usual, and Alistair noticed the rain outside suddenly freeze mid-air.</p>",
                'sticker' => '54342454',
                'allow_comments' => false,
                'notebook_id' => 1,
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'updated_at' => null,
                'status' => 'public',
                'type_id' => 1,
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'slug' => 'the-second-note',
                'title' => 'I can Fell It!',
                'priority' => '#00396B',
                'body' => "<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>
<h4>Another Title</h4>
<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>
<h5>Getting Deep</h5>
<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>",
                'sticker' => '54342454',
                'allow_comments' => true,
                'notebook_id' => null,
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'updated_at' => null,
                'status' => 'private',
                'type_id' => 2,
            ],
            [
                'id' => 3,
                'user_id' => 2,
                'slug' => 'the-best-title',
                'title' => 'Something New Note',
                'priority' => '#00396B',
                'body' => "<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>
<h4>Another Title</h4>
<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>
<h5>Getting Deep</h5>
<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>",
                'sticker' => '54342454',
                'allow_comments' => true,
                'notebook_id' => 2,
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'updated_at' => null,
                'status' => 'archived',
                'type_id' => 3,
            ],
            [
                'id' => 4,
                'user_id' => 2,
                'slug' => 'what-now-im-woundering',
                'title' => 'What is going on?',
                'priority' => '#00396B',
                'body' => "<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>
<h4>Another Title</h4>
<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>
<h5>Getting Deep</h5>
<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>",
                'sticker' => '54342454',
                'allow_comments' => true,
                'notebook_id' => null,
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'updated_at' => null,
                'status' => 'public',
                'type_id' => 4
            ],
            [
                'id' => 5,
                'user_id' => 3,
                'slug' => 'the-clockmakers-compass',
                'title' => 'The Clockmaker’s Compass',
                'priority' => '#00396B',
                'body' => "<p>The rain in Oakhaven never just fell; it whispered. For forty years, Alistair Vance had ignored those whispers, keeping his eyes locked tightly on the intricate gears of the pocket watches he repaired. His shop smelled of brass polish, dried lavender, and old paper. He liked things that followed a precise, predictable rhythm.</p>
<p>Everything changed on a damp Tuesday afternoon when a young woman in a drenched trench coat left a peculiar brass compass on his counter. Before Alistair could call out to her, she vanished into the thick fog.</p>
<p>Unlike a normal compass, this one didn't point north. Its single, silver needle spun erratically whenever Alistair felt anxious, but slowed down to point directly at a hidden brick wall behind his own workbench whenever he breathed deeply. Intrigued, Alistair grabbed a hammer and carefully pried away the loose mortar.</p>
<p>Behind the wall sat a dust-covered iron box. Inside was a leather-bound journal written in his own handwriting—dated exactly thirty years into the future. The very first line read: “Alistair, if you are reading this, it means she finally brought you the compass. Do not trust the grandfather clock in the town square. It is not counting time; it is stealing it.”</p>
<p>As the town clock began to chime five o'clock, the echoes sounded heavier than usual, and Alistair noticed the rain outside suddenly freeze mid-air.</p>",
                'sticker' => '54342454',
                'allow_comments' => false,
                'notebook_id' => 1,
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'updated_at' => null,
                'status' => 'public',
                'type_id' => 1,
            ],
            [
                'id' => 6,
                'user_id' => 3,
                'slug' => 'the-second-note',
                'title' => 'I can Fell It!',
                'priority' => '#00396B',
                'body' => "<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>
<h4>Another Title</h4>
<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>
<h5>Getting Deep</h5>
<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>",
                'sticker' => '54342454',
                'allow_comments' => true,
                'notebook_id' => null,
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'updated_at' => null,
                'status' => 'private',
                'type_id' => 2,
            ],
        ];

        $this->db->table('notes')->insertBatch($notesData);
    }
}
