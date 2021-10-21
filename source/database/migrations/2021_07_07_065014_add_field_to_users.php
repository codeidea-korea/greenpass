<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('code')->unique()->nullable();
            $table->string('cellphone')->nullable();
            $table->string('birthday')->nullable();
            $table->string('postcode')->nullable();
            $table->string('address')->nullable();
            $table->string('address_detail')->nullable();
            $table->string('street_address')->nullable();
            $table->string('street_address_detail')->nullable();
            $table->datetime('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'code', 'cellphone', 'birthday',
                'postcode', 'address', 'address_detail',
                'street_address', 'street_address_detail',
                'last_login_at', 'last_login_ip',
            ]);
        });
    }
}
