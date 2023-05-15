<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->string('email')->nullable();
            $table->integer('phone')->unique();
            $table->text('address')->nullable();
            $table->decimal('chest', 4, 2)->nullable();
            $table->decimal('waist', 4, 2)->nullable();
            $table->decimal('hips', 4, 2)->nullable();
            $table->decimal('rise', 4, 2)->nullable();
            $table->decimal('neck_to_waist', 4, 2)->nullable();
            $table->decimal('waist_to_floor', 4, 2)->nullable();
            $table->decimal('outseam', 4, 2)->nullable();
            $table->decimal('inseam', 4, 2)->nullable();
            $table->decimal('bust', 4, 2)->nullable();
            $table->decimal('crotch', 4, 2)->nullable();
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
        Schema::dropIfExists('customers');
    }
};
