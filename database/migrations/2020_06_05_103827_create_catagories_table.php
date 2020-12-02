<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateCatagoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catagories', function (Blueprint $table) {
            $table->id();
            $table->text('catagory');
            $table->timestamps();
        });

        DB::table('catagories')->insert([
        ['catagory' => 'Inspirational'],
        ['catagory' => 'Motivational'],
        ['catagory' => 'Life'],
        ['catagory' => 'Friendship'],
        ['catagory' => 'Funny'],
        ['catagory' => 'Happiness'],
        ['catagory' => 'Love'],
        ['catagory' => 'Success'],
        ['catagory' => 'Thoughtful'],
        ['catagory' => 'Wisdom'],
        ['catagory' => 'Movies']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catagories');
    }
}
