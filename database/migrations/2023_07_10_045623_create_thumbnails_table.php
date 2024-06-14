<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThumbnailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if( Schema::hasTable( 'thumbnails' ) ) {
            return;
        }
        Schema::create('thumbnails', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->foreignId( 'article_id' )->constrained();
            $table->string( 'name', 255 )->nullable(false);
            $table->timestamp( 'created_at' )->useCurrent();
            $table->timestamp( 'updated_at' )->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes(); // カラム名の初期値は、deleted_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thumbnails');
    }
}
