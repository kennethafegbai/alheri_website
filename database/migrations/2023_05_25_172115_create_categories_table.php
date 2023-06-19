<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price');
            $table->string('image');
            $table->mediumText('desc');
            $table->mediumText('service')->nullable();
            $table->timestamps();
        });

        DB::table('categories')->insert([
            [
                'name'=> 'Standard',
                'price'=> '8000',
                'image'=> 'roomCategory/room.jpg',
                'desc'=> 'Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde',
               'service'=>'breakfast,Lunch,Massage,Wifi',
                'created_at'=> \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'=> \Carbon\Carbon::now()->toDateTimeString(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
