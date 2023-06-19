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
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->decimal('amount');
            $table->string('customer_name');
            $table->string('customer_tel');
            $table->string('customer_email');
            $table->string('customer_address');
            $table->string('arrival');
            $table->string('departure');
            $table->string('persons');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('category_id');
            $table->integer('status')->default(0);
            $table->timestamps();
        });

        DB::table('reserves')->insert([
            [
                'invoice'=> 'puurorhhf',
                'amount'=> 8000.0,
                'customer_name'=> 'Dave Rujus',
                'customer_tel'=> '0909800000000',
                'customer_email'=> 'dave@gmail.com',
                'customer_address'=> '45, Rujus str, ibadan',
                'arrival'=> '22-06-2023',
                'departure'=> '22-07-2023',
                'persons'=> '8',
                'room_id'=> 1,
                'category_id'=> 1,
                'status'=> 0,
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
        Schema::dropIfExists('reserves');
    }
};
