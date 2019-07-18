<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavouritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            Schema::create('favourites', function (Blueprint $table) {
                $table->unsignedBigInteger('contact_id')->comment('user who in favourite');
                $table->unsignedBigInteger('user_id')->comment('favourite owner user')->index();

                $table->primary(['contact_id', 'user_id']);

                $table->foreign('contact_id')->references('id')->on('users')
                    ->onUpdate('restrict')->onDelete('restrict');
                $table->foreign('user_id')->references('id')->on('users')
                    ->onUpdate('restrict')->onDelete('restrict');
            });
        } catch (\Exception $e) {
            $this->down(); // fix rollback foreign key error
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favourites');
    }
}
