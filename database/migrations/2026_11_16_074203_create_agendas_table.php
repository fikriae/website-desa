
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();

            // Penulis agenda (Admin / Editor)
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // Informasi agenda
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('location')->nullable();

            // Jadwal kegiatan
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();

            // Gambar kegiatan
            $table->string('featured_image')->nullable();

            // Status agenda
            $table->enum('status', ['draft', 'published'])
                ->default('draft');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
