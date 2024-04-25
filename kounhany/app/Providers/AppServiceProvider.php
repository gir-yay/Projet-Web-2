<?php

namespace App\Providers;

use App\Models\EmailSettings;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        $email_settings = EmailSettings::first();
        if ($email_settings) {
            config()->set('mail.mailers.smtp', [
                'transport' => 'smtp',
                'host' => $email_settings->host,
                'port' => $email_settings->port,
                'encryption' => $email_settings->encryption,
                'username' => $email_settings->username,
                'password' => $email_settings->password,

            ]);
            config()->set('mail.from', [
                'address' => $email_settings->username,
                'name' => "KounHany",
            ]);
        }
    }
}
