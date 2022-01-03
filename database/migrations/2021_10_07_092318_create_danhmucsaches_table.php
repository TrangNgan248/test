<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhmucsachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danhmucsaches', function (Blueprint $table) {
            $table->id();
            $table->string('DMS_Tieude');
            $table->integer('DMS_parentId')->default(0);
            $table->string('DMS_Mota');
            $table->integer('DMS_Vitri');
//             $table->binary('DMS_TrangThai');
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
        Schema::dropIfExists('danhmucsaches');
    }
}
