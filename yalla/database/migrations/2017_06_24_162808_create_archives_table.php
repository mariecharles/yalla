<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('archives');

        Schema::defaultStringLength(191);

        Schema::create('archives', function (Blueprint $table) {

            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('title');
            $table->longText('content');
            $table->longText('resume');
            $table->longText('meta_description');
            $table->string('img')->nullable();
            $table->integer('active')->default(1);
            $table->string('lang');
            $table->timestamps();
            $table->integer('saved_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archives');
    }
}
