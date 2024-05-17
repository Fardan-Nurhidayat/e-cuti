<?php

use App\Models\JenisCuti;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(JenisCuti::class, 'jeniscuti_id')->constrained()->cascadeOnDelete();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->enum('status', ['Pending' ,'Diterima' , 'Ditolak']);
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
         * Reverse the migrations.
         */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans', function (Blueprint $table) {
            $table->dropForeignIdFor(User::class, 'user_id');
            $table->dropForeign(['jeniscuti_id']);
        });
    }
};