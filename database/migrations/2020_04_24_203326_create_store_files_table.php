<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained()->onDelete('CASCADE');
            $table->string('filename');
            $table->string('ext', 5);
            $table->float('file_size')->unsigned();
            $table->string('mime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_files');
    }
}
