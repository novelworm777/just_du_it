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
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->foreignId('transaction_id')->constrained('header_transactions'); // FK
            $table->foreignId('shoe_id')->constrained('shoes')->onUpdate('cascade'); // FK
            $table->unsignedInteger('quantity');
            $table->primary(['transaction_id', 'shoe_id']); // PK
            $table->index('transaction_id'); // don't know why but need another index or FK will not appear
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
