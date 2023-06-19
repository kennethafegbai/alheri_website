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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('twitter');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('linkedin');
            $table->timestamps();
        });

        DB::table('settings')->insert(
            [
                'logo'=>'logo.png',
                'name'=>'Aleri hotel',
                'address'=>'52, Crovers Str',
                'phone'=>'08007565464',
                'email'=>'aleri@gmail.com',
                'twitter'=>'https://twitter.com',
                'facebook'=>'https://twitter.com',
                'instagram'=>'https://twitter.com',
                'linkedin'=>'https://twitter.com',
                'created_at'=> \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'=> \Carbon\Carbon::now()->toDateTimeString(),
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
