<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedSmallInteger('cohort_year')->nullable()->index();
        });

        Schema::create('academic_years', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->date('starts_on')->nullable();
            $table->date('ends_on')->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });

        Schema::create('school_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('academic_year_id')
                ->constrained('academic_years')
                ->cascadeOnDelete();
            $table->string('name');
            $table->unsignedTinyInteger('grade_level');
            $table->timestamps();

            $table->unique(['academic_year_id', 'name']);
        });

        Schema::create('student_class_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('academic_year_id')
                ->constrained('academic_years')
                ->cascadeOnDelete();
            $table->foreignId('school_class_id')
                ->constrained('school_classes')
                ->restrictOnDelete();
            $table->timestamps();

            $table->unique(['user_id', 'academic_year_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_class_histories');
        Schema::dropIfExists('school_classes');
        Schema::dropIfExists('academic_years');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('cohort_year');
        });
    }
};
