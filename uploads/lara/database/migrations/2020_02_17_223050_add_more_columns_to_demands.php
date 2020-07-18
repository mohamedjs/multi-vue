<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreColumnsToDemands extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demands', function (Blueprint $table) {
            $table->string("name")->nullable()->after("provider_id");
            $table->string("phone")->nullable()->after("name");
            $table->text("note")->nullable()->after("phone");
            $table->text("image")->nullable()->after("note");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('demands', function (Blueprint $table) {
            $table->dropColumn("name");
            $table->dropColumn("phone");
            $table->dropColumn("note");
            $table->dropColumn("image");
        });
    }
}
