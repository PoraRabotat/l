<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('reports', function (Blueprint $table) {
        $table->id();
        
        // Внешние ключи (связи)
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('status_id')->constrained()->onDelete('cascade');
        
        // Поля из задания (сверься с рисунком!)
        $table->text('text');
        $table->date('report_date')->nullable();
        
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
