<?php

use App\Models\User;
use App\Models\Module;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Schema;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\Factories\HasFactory;


return new class extends Migration
{
    /**
     * Run the migrations.
     */

    use HasApiTokens, HasFactory, Notifiable;

    public function up(): void
    {
         Schema::create('user_modules', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Module::class)->constrained()->onDelete('cascade');
            $table->boolean('active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_modules');
    }
};
