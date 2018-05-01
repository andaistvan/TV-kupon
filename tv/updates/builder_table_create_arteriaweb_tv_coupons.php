<?php namespace Arteriaweb\Tv\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateArteriawebTvCoupons extends Migration
{
    public function up()
    {
        Schema::create('arteriaweb_tv_coupons', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('codes');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('arteriaweb_tv_coupons');
    }
}
