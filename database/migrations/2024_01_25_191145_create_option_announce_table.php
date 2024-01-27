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
        Schema::create('option_announce', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Option::class)->constrained()->cascadeOnDelete;
            $table->foreignIdFor(\App\Models\Announce::class)->constrained()->cascadeOnDelete;
            $table->primary(['option_id', 'announce_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('option_announce');
    }
};
