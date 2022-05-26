<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_grants', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('grant_id');
            $table->boolean('is_notification')->default(0);

            $table->index('user_id', 'user_grant_user_idx');
            $table->index('grant_id', 'user_grant_grant_idx');

            $table->foreign('user_id', 'user_grant_user_fk')->on('users')->references('id');
            $table->foreign('grant_id', 'user_grant_grant_fk')->on('grants')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_grants');
    }
};
