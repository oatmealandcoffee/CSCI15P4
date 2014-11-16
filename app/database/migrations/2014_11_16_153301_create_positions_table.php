<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function($table) {

            // create common columns
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            // create specific columns
            $table->string('name');
            $table->string('fen');

        });

        // create seed data

        $names = array(
            'Ruy Lopez',
            'Sicilian Defense',
            'Queen\'s Gambit',
            'Alekhine Defense',
            'Modern Defense',
            'King\'s Indian Defense',
            'King\'s Indian Attack',
            'English Opening',
            'Dutch Defense',
            'Dutch Stonewall');

        $fens = array(
            'r1bqkbnr/pppp1ppp/2n5/1B2p3/4P3/5N2/PPPP1PPP/RNBQK2R',
            'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR',
            'rnbqkbnr/ppp1pppp/8/3p4/2PP4/8/PP2PPPP/RNBQKBNR',
            'rnbqkb1r/pppppppp/5n2/8/4P3/8/PPPP1PPP/RNBQKBNR',
            'rnbqkbnr/pppppp1p/6p1/8/4P3/8/PPPP1PPP/RNBQKBNR',
            'rnbqkb1r/pppppp1p/5np1/8/2PP4/8/PP2PPPP/RNBQKBNR',
            'rnbqkbnr/ppp1pppp/8/3p4/8/5NP1/PPPPPP1P/RNBQKB1R',
            'rnbqkbnr/pppppppp/8/8/2P5/8/PP1PPPPP/RNBQKBNR',
            'rnbqkbnr/ppppp1pp/8/5p2/3P4/8/PPP1PPPP/RNBQKBNR',
            'rnbqkbnr/ppp3pp/4p3/3p1p2/2PP4/2N5/PP2PPPP/R1BQKBNR'
        );

        for ( $i = 0 , $n = count($names) ; $i < $n ; $i++ ) {
            $position = new Position;
            $position->name = $names[$i];
            $position->fen = $fens[$i];
            $position->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('positions');
    }

}
