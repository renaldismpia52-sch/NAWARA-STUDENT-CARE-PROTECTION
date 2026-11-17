
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();

            // Identitas pelapor
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->boolean('is_anonymous')->default(false);

            // Informasi laporan
            $table->string('report_code')->unique();
            $table->string('bullying_type');
            $table->text('incident_description');
            $table->string('incident_location')->nullable();
            $table->date('incident_date')->nullable();

            // Informasi tindak lanjut
            $table->string('status')->default('menunggu');
            $table->text('handling_notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
