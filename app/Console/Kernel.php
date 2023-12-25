<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\CreateTableCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // Run once per month on 21 at 00:00
        $schedule->command('tables:create')
            ->timezone('Asia/Ho_Chi_Minh')
            ->dailyAt('09:30');
//        $schedule->call(function () {
//            Schema::create('ql_diem_cong_doan_'.session()->get('thangHienTai').session()->get('namHienTai'), function (Blueprint $table) {
//                $table->id('ql_diem_cong_doan_id');
//                $table->string('ql_diem_cong_doan_noi_dung');
//            });
//        })
//        ->timezone('Asia/Ho_Chi_Minh')
//        ->dailyAt('09:10');
//        ->monthlyOn(21, '00:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
