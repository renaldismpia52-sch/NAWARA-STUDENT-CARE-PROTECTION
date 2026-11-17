
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_import_batch_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('batch_id')
                ->constrained('student_import_batches')
                ->cascadeOnDelete();

            $table->unsignedInteger('row_number');

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('email');

            $table->string('status')->default('pending');

            $table->timestamp('email_sent_at')->nullable();

            $table->text('error_message')->nullable();

            $table->timestamps();

            $table->unique(['batch_id', 'row_number']);
            $table->index(['batch_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_import_batch_items');
    }
};
