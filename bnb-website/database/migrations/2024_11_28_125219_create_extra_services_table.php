<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    // database/migrations/xxxx_xx_xx_xxxxxx_create_extra_services_table.php
    public function up()
    {
        Schema::create('extra_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });

        // Inserting predefined services with price 10 euros.
        DB::table('extra_services')->insert([
            ['name' => 'Massage', 'description' => 'Relaxing massage service', 'price' => 10.00, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sauna', 'description' => 'Sauna access for relaxation', 'price' => 10.00, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fietsverhuur', 'description' => 'Bicycle rental service', 'price' => 10.00, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cabriolet huurauto', 'description' => 'Convertible car rental', 'price' => 10.00, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ontbijt op bed', 'description' => 'Breakfast served in bed', 'price' => 10.00, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('extra_services');
    }
};
