<?php

namespace App\Providers;

use App\Enums\NotificationType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\ServiceProvider;

class InertiaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        RedirectResponse::macro('flash', function (NotificationType $type, string $body) {
            session()->flash('notification', [
                'type' => $type,
                'body' => $body,
            ]);

            /** @var RedirectResponse $this */
            return $this;
        });

        RedirectResponse::macro('error', function (string $body) {
            return $this->flash(NotificationType::Error, $body);
        });

        RedirectResponse::macro('info', function (string $body) {
            return $this->flash(NotificationType::Info, $body);
        });

        RedirectResponse::macro('success', function (string $body) {
            return $this->flash(NotificationType::Success, $body);
        });

        RedirectResponse::macro('warning', function (string $body) {
            return $this->flash(NotificationType::Warning, $body);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
