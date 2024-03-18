<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeveloperTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developer_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('brief');
            $table->unsignedBigInteger('developer_id');
            $table->string('locale')->index();
            $table->unique(['developer_id', 'locale']);
            $table->foreign('developer_id')->references('id')->on('developers')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('developer_translations');
    }
}
