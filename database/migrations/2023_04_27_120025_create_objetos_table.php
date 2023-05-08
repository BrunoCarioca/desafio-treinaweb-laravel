<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objetos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('descricao');
            $table->boolean('entregue')->default(false);
            $table->text('imagem_objeto')->nullable();

            $table->unsignedBigInteger('local_id');
            $table->foreign('local_id')->references('id')->on('locais');

            $table->string('dono_nome')->nullable();
            $table->string('dono_cpf', 11)->nullable();
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
        Schema::dropIfExists('objetos');
    }
};
