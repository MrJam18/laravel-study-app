<?php

use App\Models\CurrenciesCredential;
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
        Schema::create('currencies_credentials', function (Blueprint $table) {
            $table->date('updated_at');
            $table->string('source');
        });
        $now = new DateTime();
        $credential = new CurrenciesCredential();
        $credential->updated_at = $now;
        $credential->source = 'не установлено';
        $credential->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies_credentials');
    }
};
