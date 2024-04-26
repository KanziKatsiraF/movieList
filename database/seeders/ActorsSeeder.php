<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //  $table->id();
    //  $table->string('Name');
    //  $table->string('Gender');
    //  $table->string('Biography');
    //  $table->date('DateOfBirth');
    //  $table->string('PlaceOfBirth');
    //  $table->string('image_url');
    //  $table->float('popularity');
    public function run()
    {
        DB::table('actors')->insert([
            [
                'Name' => 'Evan Peters',
                'Gender' => 'male',
                'Biography' => 'Evan Thomas Peters is an American actor. He is known for his multiple roles on the FX anthology series American Horror Story; as Detective Colin Zabel in the HBO crime drama limited series Mare of Easttown, which won him a Prime',
                'DateOfBirth' => '1987-01-20',
                'PlaceOfBirth' => 'United States',
                'image_url'=>'Evan_Peters.jpg',
                'popularity' =>100.1
            ],
            [
                'Name' => 'Annabelle Wallis',
                'Gender' => 'Female',
                'Biography' => 'Annabelle Wallis is an English actress. She is known for her roles as Jane Seymour in Showtime\'s period drama The Tudors (2009–2010), Grace Burgess in the BBC drama Peaky Blinders (2013–2022), Mia Form in the supernatural horror film Annabelle (2014), Jen',
                'DateOfBirth' => '1984-09-15',
                'PlaceOfBirth' => 'England',
                'image_url'=>'Annabelle_Wallis.jpg',
                'popularity' =>200.5

            ],
            [
                'Name' => 'Robin Williams',
                'Gender' => 'male',
                'Biography' => 'Robin McLaurin Williams was an American actor and comedian. Known for his improvisational skills and the wide variety of characters he created on the spur of the moment and portrayed on film, in dramas and comedies alike, he is regarded as one of the grea',
                'DateOfBirth' => '1987-01-20',
                'PlaceOfBirth' => 'United States',
                'image_url'=>'Robin_Williams.jpg',
                'popularity' =>300

            ],
            [
                'Name' => 'Daniel Radcliffe',
                'Gender' => 'male',
                'Biography' => 'Daniel Jacob Radcliffe is an English actor. He rose to fame at age twelve, when he began portraying Harry Potter in the film series of the same name; and has held various other film and theatre roles. Over his career, Radcliffe has received various awards',
                'DateOfBirth' => '1951-07-21',
                'PlaceOfBirth' => 'United States',
                'image_url'=>'Daniel_Radcliffe.jpg',
                'popularity' =>100.2

            ],
            [
                'Name' => 'Eddie Redmayne',
                'Gender' => 'male',
                'Biography' => 'Edward John David Redmayne OBE is an English actor. Known for his roles in biopics and blockbusters, he has received various accolades, including an Academy Award, a Tony Award, a BAFTA Award, and two Olivier Awards.',
                'DateOfBirth' => '1987-01-20',
                'PlaceOfBirth' => 'United States',
                'image_url'=>'Eddie_Redmayne.jpg',
                'popularity' =>100.1

            ],
        ]);
    }
}
