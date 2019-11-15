<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtisansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artisans', function (Blueprint $table) {
            $table->increments('id');

			$table->string('business_name')->nullable();
			$table->text('bio')->nullable();
			$table->string('bank_name')->nullable();
			$table->string('account_number')->nullable();
			$table->string('account_name')->nullable();
			$table->string('guarantor_full_name')->nullable();
			$table->string('guarantor_phone')->nullable();
			$table->string('guarantor_email')->nullable();
			$table->string('days_available')->nullable();
			$table->string('hours_available')->nullable();
			$table->boolean('is_available')->default(1);
			$table->integer('user_id');

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
        Schema::dropIfExists('artisans');
    }
}
