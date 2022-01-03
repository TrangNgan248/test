<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhomtinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhomtins', function (Blueprint $table) {
            $table->id();
            $table->string('NT_Ten');
            $table->text('NT_MoTa');
            $table->integer('NT_ViTri');
            $table->boolean('NT_TrangThai')->nullable();
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
        Schema::dropIfExists('nhomtins');
    }
}
