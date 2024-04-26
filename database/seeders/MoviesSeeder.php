<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $table->id();
        // $table->string('title');
        // $table->string('description');
        // $table->string('genre')->nullable();
        // $table->foreignID('actors_id');
        // $table->foreign('actors_id')->references('id')->on('actors')->onDelete('cascade');
        // $table->string('director');
        // $table->string('image_url');
        // $table->string('background_url');
        // $table->integer('watchlist_count');
        // $table->timestamp('release_date')->nullable();
        //
        DB::table('movies')->insert([
            [
                'title' => 'Dahmer',
                'description' => 'From high school to the Army, jeff struggles to find stability. While living in his grandmothers house, Jeff begins targetting young men at gay bars',
                'genre' => 'Documentary',
                'actors_id' => '1',
                'director' => 'Ryan Murphy',
                'release_date'=>'2001-12-19',
                'image_url' =>'dahmer_.jpg',
                'background_url'=>'dahmerbackground.jpg',
                'watchlist_count'=>0
            ],
            [

                'title' => 'Anabelle',
                'description' => 'John and Mia Form are attacked by members of a satanic cult that uses their old doll as a conduit to make their life miserable. This unleashes a string of paranormal events in the Forms residence.',
                'genre' => 'Horror',
                'actors_id' => '2',
                'director' => 'John R. Leonetti',
                'release_date'=>'2001-12-19',
                'image_url' =>'anabelle.jpg',
                'background_url'=>'.',
                'watchlist_count'=> 1
            ],
            [

                'title' => 'Jumanji',
                'description' => 'Two children come across a magical board game. While playing it, they meet Alan, a man who was trapped in the game, and attempt to free him while facing different kinds of danger.',
                'genre' => 'Comedy',
                'actors_id' => '3',
                'director' => 'Joe Johnston',
                'release_date'=>'2001-12-19',
                'image_url' =>'posterJumanji.jpg',
                'background_url'=>'jumanjibackground.jpg',
                'watchlist_count'=>2
            ],
            [

                'title' => 'Harry Poter',
                'description' => 'On his 11th birthday, Harry receives a letter inviting him to study magic at the Hogwarts School of Witchcraft and Wizardry. Harry discovers that not only is he a wizard, but he is a famous one. He meets two best friends, Ron Weasley and Hermione Granger',
                'genre' => 'Fantasy',
                'actors_id' => '3',
                'director' => 'David Yates',
                'release_date'=>'2001-12-19',
                'image_url' =>'harryPoter.jpg',
                'background_url'=>'hogwarts.jpg',
                'watchlist_count'=>3
            ],
            [

                'title' => 'Fantastic Beasts and Where to Find Them ',
                'description' => 'While a strange dark force terrorises New York City, British magizoologist Newt Scamander enlists a non-magical Jacobs help to round up some escaped magical creatures.',
                'genre' => 'Fantasy',
                'actors_id' => '1',
                'director' => 'David Yates',
                'release_date'=>'2016-11-16',
                'image_url' =>'fantasticbeasts.jpg',
                'background_url'=>'fantasticbackground.jpg',
                'watchlist_count'=>4
            ],
        ]);
    }
}
