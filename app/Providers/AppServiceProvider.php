<?php

namespace App\Providers;

use App\Models\User;
use App\Services\Newsletter;
use Illuminate\Http\Response;
use MailchimpMarketing\ApiClient;
use Illuminate\Support\Facades\Gate;
use App\Services\MailchimpNewsletter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind(Newsletter::class, function() {
            
            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us8'
            ]);
            
            return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin', function (User $user){
           return $user->username === 'Mike';
        });
    }
}
