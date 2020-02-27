<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaggablesTable extends Migration
{
    public function up()
    {
        Schema::create('yyys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("tag_id");

            $table->unsignedBigInteger("yyy_id");
            $table->string("yyy_type");
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('yyys');
    }
}
