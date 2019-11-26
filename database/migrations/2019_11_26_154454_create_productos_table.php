<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */

/*id    Autoincremental
nombre    String
precio    Decimal(8,2)    nulo
categoria    String de longitud 64
imagen    String    nulo
pendiente    Booleano    false
descripcion    Text    nulo */

    public function up() {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nombre");
            $table->decimal("precio", 8, 2)->nullable()->default(null);
            $table->string("categoria",64);
            $table->string("imagen")->nullable()->default(null);
            $table->boolean("pendiente")->default(false);
            $table->text("descripcion")->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('productos');
    }
}
