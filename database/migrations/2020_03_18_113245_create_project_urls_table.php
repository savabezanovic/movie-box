<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateProjectUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_urls', function (Blueprint $table) {
            $table->id();
            $table->string("url");
            $table->bigInteger('project_id')->unsigned();
            $table->bigInteger('frequency_id')->unsigned();
            $table->timestamp("checked_at");
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
        Schema::dropIfExists('project_urls');
    }
}
