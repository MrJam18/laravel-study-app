<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::statement('ALTER TABLE news MODIFY COLUMN created_at
    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
        Schema::table('news', function (Blueprint $table) {
            $table->string('link');
            $table->bigInteger('guid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE news MODIFY COLUMN created_at
    DATE NOT NULL');
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('link');
        });
    }
};
