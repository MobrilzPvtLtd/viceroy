<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Artisan;
use App\Models\Currency;

class ScheduledRunOnLive extends Command
{
    protected $signature = 'scheduledRunOnLive:run';
    protected $description = 'Run the scheduledRunOnLive command';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            $response = Http::get('https://openexchangerates.org/api/latest.json', [
                'app_id' => '7321656184df4605901331bcaac3b1cd',
                'base' => 'USD'
            ]);

            if ($response->ok()) {
                $data = $response->json();
                // dd($data);
                if (isset($data['rates']) && is_array($data['rates'])) {
                    foreach ($data['rates'] as $code => $rate) {
                        Currency::where('code',$code)->update(
                            ['bcr' => $rate]
                        );
                    }
                }
            } else {
               return response()->json('Error: ' . $response->status());
            }
        } catch (\Exception $e) {
            return response()->json('Exception: ' . $e->getMessage());
        }

        $this->info('scheduledRunOnLive command executed!');
    }
}
