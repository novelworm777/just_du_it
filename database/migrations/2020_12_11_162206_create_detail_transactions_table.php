<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('detail_transactions', function (Blueprint $table) {
        //     $table->unsignedBigInteger('transaction_id');
        //     $table->unsignedBigInteger('shoe_id');
        //     $table->unsignedInteger('quantity');
        // });

        // Schema::table('detail_transactions', function (Blueprint $table) {
        //     // PK
        //     $table->primary(['transaction_id', 'shoe_id']);
        // });

        // Schema::table('detail_transactions', function (Blueprint $table) {
        //     // FK
        //     // $table->foreign('transaction_id')->references('id')->on('header_transactions');
        //     $table->foreign('shoe_id')->references('id')->on('shoes')->onUpdate('cascade');
        // });

        // DB::statement(
        //     "ALTER TABLE detail_transcations ADD FOREIGN KEY (shoes_id) REFERENCES shoes(id) ON UPDATE CASCADE"
        // );

        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->foreignId('transaction_id')->constrained('header_transactions'); // FK
            $table->foreignId('shoe_id')->constrained('shoes')->onUpdate('cascade'); // FK
            $table->unsignedInteger('quantity');
            $table->primary(['transaction_id', 'shoe_id']); // PK
            $table->index('transaction_id'); // don't know why but need another index or FK will not appear
            // $table->foreign('transaction_id')->references('id')->on('header_transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transactions');
    }
}
