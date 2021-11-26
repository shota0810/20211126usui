<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id()->nullable(false);
            $table->string('fullname', 255)->nullable(false);
            $table->tinyInteger('gender')->comment('性別 1:男、2:女')->nullable(false);
            $table->string('email',255)->nullable(false);
            $table->char('postcode', 8);
            $table->string('address',255)->nullable(false);
            $table->string('building_name',255)->nullable(true);
            $table->text('opinion',120)->nullable(false);
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
        Schema::dropIfExists('contacts');
    }
}
