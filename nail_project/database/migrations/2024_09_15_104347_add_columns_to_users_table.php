<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // เพิ่มคอลัมน์ใหม่
            $table->string('phone_number')->nullable();
            $table->integer('province_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('role')->default('user');
    
            // เพิ่ม index ให้กับคอลัมน์ province_id และ district_id
            $table->index('province_id');
            $table->index('district_id');
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // ลบคอลัมน์ใหม่
            $table->dropColumn(['phone_number', 'province_id', 'district_id','role']);
    
            // ลบ index ที่สร้างไว้
            $table->dropIndex(['province_id']);
            $table->dropIndex(['district_id']);
        });
    }
};
