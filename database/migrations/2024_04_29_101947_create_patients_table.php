<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('kk', 16);
            $table->string('name');
            $table->string('phone', 20);
            $table->string('email')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('birth_place');
            $table->date('birth_date');
            $table->boolean('is_deceased')->default(false);
            $table->text('address_line');
            $table->string('city');
            $table->string('city_code');
            $table->string('province');
            $table->string('province_code');
            $table->string('district');
            $table->string('district_code');
            $table->string('village');
            $table->string('village_code');
            $table->string('rt');
            $table->string('rw');
            $table->string('postal_code', 5);
            $table->string('marital_status');
            $table->string('relationship_name')->nullable();
            $table->string('relationship_phone', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
