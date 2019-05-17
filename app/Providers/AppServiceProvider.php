<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Message;
use App\User;
use Auth;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = User::find(Auth::user()->id);
                $send_messages_num = $user->send_messages()->count();
                $inbox_messages_num = $user->inbox_messages()->where('seen', false)->count();

                View::share('num_inbox', $inbox_messages_num);
                View::share('num_send', $send_messages_num);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
