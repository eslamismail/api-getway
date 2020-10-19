<?php

use App\Room;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('image_name')->nullable();
            $table->enum('type', ['public', 'private'])->default('public');
            $table->timestamps();
        });

        $arr = ['Suez', 'Cairo', 'Qena', 'New cairo'];
        foreach ($arr as $name) {
            $room = new Room();
            $room->name = $name;
            $room->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
