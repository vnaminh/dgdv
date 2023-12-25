<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDmDiemCongTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'dm_diem_cong';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('dm_diem_cong_id');
            $table->string('dm_diem_cong_ma',255);
            $table->string('dm_diem_cong_ten', 255);
            $table->string('dm_diem_cong_ten_vn', 255);
            $table->integer('dm_diem_cong_muc_diem_cong_toi_da');
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
