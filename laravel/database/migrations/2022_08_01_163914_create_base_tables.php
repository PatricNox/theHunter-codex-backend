<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Static, no-relation
        Schema::create('maps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('media_url')->nullable();
            $table->boolean('is_dlc')->default(false);
        });

        Schema::create('trophies', function (Blueprint $table) {
            $table->id();
            $table->string('type');
        });

        Schema::create('animal_classes', function (Blueprint $table) {
            $table->id();
        });

        Schema::create('weapon_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        // Dynamic, relation
        Schema::create('ammunitions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('trophy_id')->constrained();
            $table->foreignId('animal_class_id')->constrained();
            $table->string('max_difficulty');
            $table->string('max_weight');
            $table->boolean('is_dlc')->default(false);
        });

        Schema::create('animal_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_id')->constrained();
            $table->string('bronze');
            $table->string('silver');
            $table->string('gold');
            $table->string('diamond');
        });

        // Weapon
        Schema::create('weapons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('weapon_type_id')->constrained();
            $table->string('name');
            $table->boolean('is_dlc')->default(false);
        });

        Schema::create('ammunition_weapon', function (Blueprint $table) {
            $table->id();
            $table->foreignId('weapon_id')->constrained();
            $table->foreignId('ammunition_id')->constrained();
        });

        Schema::create('animal_map', function (Blueprint $table) {
            $table->id();
            $table->foreignId('map_id')->constrained();
            $table->foreignId('animal_id')->constrained();
        });

        Schema::create('weapon_animal_class', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_class_id')->constrained();
            $table->foreignId('weapon_id')->constrained();
        });

        Schema::create('ammunition_animal_class', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_class_id')->constrained();
            $table->foreignId('ammunition_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weapons');
        Schema::dropIfExists('animal_ratings');
        Schema::dropIfExists('animals');
        Schema::dropIfExists('classes');
        Schema::dropIfExists('ammunitions');
        Schema::dropIfExists('weapon_types');
        Schema::dropIfExists('trophies');
        Schema::dropIfExists('maps');
    }
}
