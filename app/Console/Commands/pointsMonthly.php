<?php

namespace App\Console\Commands;

use App\Models\Profit;
use Illuminate\Console\Command;

class pointsMonthly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'points:monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'restart points monthly';

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
        Profit::first()->update([
            'month_profit' => 0,
        ]);

        return 0;
    }
}
