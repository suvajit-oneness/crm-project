<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sender_id');
            $table->integer('receiver_id');
            $table->string('type')->nullable();
            $table->string('title')->nullable();
            $table->text('message')->nullable();
            $table->string('route')->nullable();
            $table->integer('read_flag')->comment('0 is unread, 1 is read')->default(0);
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('notifications');
    }
}
