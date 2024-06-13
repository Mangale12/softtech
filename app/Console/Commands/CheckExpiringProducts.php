<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ProductionBatch;
class CheckExpiringProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkExpirationDate:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for products that are about to expire and notify the admin';

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

         $today = Carbon::now(); // 2024-05-06

        // Get all production batches
        $productionBatches = ProductionBatch::with('inventoryProduct')
                            ->where('is_alrted', 0)
                            ->get();

        foreach ($productionBatches as $batch) {
            $productionDate = Carbon::parse($batch->production_date);//2024-05-02
            $alertDays = $batch->product->alert_days; // 5
            $expiryDate = $productionDate->addDays($alertDays); // 2024-05-07

            if ($expiryDate->lessThanOrEqualTo($today)) {
                // Send notification (email, Slack, etc.)
                Mail::to('admin@example.com')->send(new \App\Mail\ProductExpiryWarning($batch));
            }
        }

        $this->info('Checked for expiring products.');
    }
}
