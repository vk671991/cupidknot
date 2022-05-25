<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email', 100)->unique();
            $table->string('phone', 10)->unique();
            $table->date('date_of_birth');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('annual_income');
            $table->string('occupation')->nullable();
            $table->string('famiy_type')->nullable();
            $table->string('manglik')->nullable();
            $table->string('password');
            $table->enum('google_connect', ['0', '1'])->comment('0 -> no, 1 -> yes')->default(0);
            $table->string('google_id')->nullable();
            $table->enum('is_admin', ['0', '1'])->comment('0 -> no, 1 -> yes')->default(0);
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}
