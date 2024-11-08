<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id'); // Voeg de user_id kolom toe
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Maak een foreign key die verwijst naar de users tabel
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Verwijder de foreign key
            $table->dropColumn('user_id'); // Verwijder de user_id kolom
        });
    }
}
