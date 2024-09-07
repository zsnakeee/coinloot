<?php

namespace App\Console\Commands;

use App\Models\Profit;
use App\Models\User;
use Illuminate\Console\Command;

class pointsDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'points:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'restart points daily';

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
        User::all()->each(function ($user) {
            $user->today_point = 0;
            $user->save();
        });

        Profit::first()->update([
            'today_profit' => 0,
        ]);

        return 0;
    }
}
