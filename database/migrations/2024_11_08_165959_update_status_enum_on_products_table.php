<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        DB::statement("ALTER TABLE products MODIFY COLUMN status ENUM('uitgeleend', 'teruggegeven_lener', 'teruggegeven_bevestigd', 'beschikbaar') DEFAULT 'uitgeleend'");
    }
    
    public function down()
    {
        DB::statement("ALTER TABLE products MODIFY COLUMN status ENUM('uitgeleend', 'teruggegeven_lener', 'teruggegeven_bevestigd') DEFAULT 'uitgeleend'");
    }
    
};
