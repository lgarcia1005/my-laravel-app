<?php

namespace App\Providers;

use App\Services\ConvertKitNewsletter;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class NewsletterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(Newsletter::class, function () {
            $client = (new ApiClient())->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us21',
            ]);

            return new MailchimpNewsletter($client);
        });

        $this->app->bind(Newsletter::class, function () {
            return new ConvertKitNewsletter();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
