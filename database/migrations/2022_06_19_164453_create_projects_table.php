<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->unsignedBigInteger('developer_id');
            $table->foreign('developer_id')->references('id')->on('developers')->onDelete('cascade');
            $table->index(['type_id' , 'location_id' , 'developer_id']);
            $table->string('image');
            $table->string('slug');
            $table->string('area');
            $table->string('installment')->nullable();
            $table->string('down_payment')->nullable();
            $table->string('delivery')->nullable();
            $table->string('status')->nullable();
            $table->tinyInteger('home')->default(0);
            $table->tinyInteger('developer')->default(0);
            $table->tinyInteger('location')->default(0);
            $table->tinyInteger('type')->default(0);
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
        Schema::dropIfExists('projects');
    }
}
