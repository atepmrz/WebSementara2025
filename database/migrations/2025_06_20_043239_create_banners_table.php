<?php

// database/migrations/xxxx_xx_xx_create_banners_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
           $table->id();
           $table->string('image_path'); // Pastikan kolom ini ada
           $table->timestamps();
       });
    }

    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
