<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('table_name')->unique()->comment('Table name');
            $table->string('name')->comment('Board name');
            $table->string('type')->default('default')->comment('Board type');
            $table->string('skin')->default('default')->comment('Board skin');
            $table->integer('item_count_per_page')->comment('Display item count per page on content list');
            $table->string('category')->nullable()->comment('Category');
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
}
