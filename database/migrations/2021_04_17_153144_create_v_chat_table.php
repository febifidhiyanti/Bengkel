<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "CREATE VIEW v_chat as
                SELECT c.user, u.name, c.message, c.created_at, c.updated_at, u.photo
                FROM chats c INNER JOIN users u ON c.user = u.id;";
    
        DB::statement($sql);
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       DB:statement("drop view if exists v_chat;");
    }
}
