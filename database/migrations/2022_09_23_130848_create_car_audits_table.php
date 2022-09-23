<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('car_audits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')
                ->constrained();
            $table->foreignId('user_id')
                ->constrained();
            $table->enum('action', [
                'created',
                'updated',
                'deleted',
            ]);
            $table->longText('data');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('car_audits');
    }
};