<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cow_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('cow_id')->unique();
            $table->string('breed');
            $table->date('birth_date');
            $table->decimal('weight', 8, 2);
            $table->enum('health_status', ['healthy', 'at-risk', 'sick'])->default('healthy');
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cow_profiles');
    }
};
