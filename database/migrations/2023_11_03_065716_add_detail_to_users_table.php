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
        Schema::table('users', function (Blueprint $table) {
            $table->text('address')->nullable();
            $table->string('no_handphone')->nullable();
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->text('bio')->nullable();
            $table->string('avatar')->nullable();
            $table->date('dateofbirth')->nullable();
            $table->char('province_code', 2)->nullable();
            $table->char('city_code', 4)->nullable();
            $table->char('district_code', 7)->nullable();
            $table->char('village_code', 10)->nullable();

            $table->foreign('province_code')->references('code')->on('provinces')->onDelete('set null');
            $table->foreign('city_code')->references('code')->on('cities')->onDelete('set null');
            $table->foreign('district_code')->references('code')->on('districts')->onDelete('set null');
            $table->foreign('village_code')->references('code')->on('villages')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('no_handphone');
            $table->dropColumn('gender');
            $table->dropColumn('bio');
            $table->dropColumn('avatar');
        });
    }
};
