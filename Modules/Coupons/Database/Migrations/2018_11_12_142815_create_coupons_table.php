<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
			$table->string('code');
            $table->boolean('status');
            $table->integer('max_use');
            $table->integer('num_use')->default(0);
            $table->integer('limit_per_order');
            $table->string('reduction_type');
            $table->decimal('reduction_amount');
            $table->date('start_date');
            $table->date('end_date');

            $table->unique('code');
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
        Schema::dropIfExists('coupons');
    }
}
