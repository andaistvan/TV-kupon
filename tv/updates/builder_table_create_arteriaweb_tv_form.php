<?php namespace Arteriaweb\Tv\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateArteriawebTvForm extends Migration
{
    public function up()
    {
        Schema::create('arteriaweb_tv_form', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('code');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('arteriaweb_tv_form');
    }
}
