<?php

namespace App\Commands;

use App\Services\HttpClientService;
use LaravelZero\Framework\Commands\Command;

class PriceCommand extends Command
{
    use HttpClientService;

    protected $signature = 'price {symbol}';

    protected $description = 'Display the current value of the stock with the given symbol';

    public function handlePrice($response)
    {
        if ($response) {
            $this->task('Fetching Stock Data', function () {
                return true;
            });
            $this->info("Current price: $response $");
            $this->notify('Stock Price', "Current price: $response $");

            return;
        }
        $this->task('Fetching Stock Data', function () {
            return false;
        });

        return $this->notify('Error', 'Stock not found!');
    }

    public function handle()
    {
        $symbol = $this->argument('symbol');
        $this->handlePrice($this->fetchPrice($symbol));
    }
}
