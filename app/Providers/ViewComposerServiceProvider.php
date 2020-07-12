<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            [
                'layouts.admin.inc.sidebar',
            ],
            'App\Http\ViewComposers\Admin\SidebarComposer'
        );

         view()->composer(
            [
                'layouts.admin.app',
            ],
            'App\Http\ViewComposers\Admin\AppComposer'
        );
        view()->composer(
            [
                'layouts.header',
            ],
            'App\Http\ViewComposers\HeaderComposer'
        );
        view()->composer(
            [
                'layouts.footer'
            ],
            'App\Http\ViewComposers\FooterComposer'

        );
        view()->composer(
            [
                'layouts.app','contact.index'
            ],
            'App\Http\ViewComposers\Frontend\FooterComposer'
        );


          view()->composer(
            [
                'layouts.app',
            ],
            'App\Http\ViewComposers\Frontend\AppComposer'
        );
        view()->composer(
            [
                'frontend.inc.feedbackform',
            ],
            'App\Http\ViewComposers\Frontend\feedbackComposer'
        );
        view()->composer(
            [
                'frontend.inc.sidebar',
            ],
            'App\Http\ViewComposers\Frontend\SidebarComposer'
        );
        view()->composer(
            [
                'frontend.home','frontend.inc.sidebar',
            ],
            'App\Http\ViewComposers\Frontend\BlogComposer'
        );




    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
