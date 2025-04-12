<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ft_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->dateTime('transaction_date');
            $table->string('transaction_type');
            $table->decimal('amount', 64, 4);
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('ft_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ft_transactions');
    }
};
