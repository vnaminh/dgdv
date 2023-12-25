<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tables:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new tables';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Schema::create('ql_diem_cong_doan_'.session()->get('thangHienTai').session()->get('namHienTai'), function (Blueprint $table) {
            $table->id('ql_diem_cong_doan_id');
            $table->string('ql_diem_cong_doan_noi_dung');
        });
    }
}
