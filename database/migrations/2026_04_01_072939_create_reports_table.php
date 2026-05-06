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
        $table->string('number');
        $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
        $table->foreignId('status_id')->nullable()->constrained()->onDelete('cascade');
        $table->text('text');
        $table->date('report_date')->nullable();

        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->string('login')->unique()->nullable();
        $table->string('lastname')->nullable();
        $table->string('middlename')->nullable();
        $table->string('tel')->nullable();

        $table->rememberToken();
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
