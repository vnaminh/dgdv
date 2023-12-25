<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDmChatLuongHoanThanhTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'dm_chat_luong_hoan_thanh';

    /**
     * Run the migrations.
     * @table luong_dm_ngay_phep
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('dm_chat_luong_hoan_thanh_id');
            $table->string('dm_chat_luong_hoan_thanh_ma',255);
            $table->string('dm_chat_luong_hoan_thanh_ten', 255);
            $table->string('dm_chat_luong_hoan_thanh_ten_vn', 255);
            $table->double('dm_chat_luong_hoan_thanh_diem', 11);
            $table->tinyInteger('dm_chat_luong_hoan_thanh_su_dung')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->set_schema_table);
    }
}
