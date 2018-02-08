<?php

namespace comments\commentssystem;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;

use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class commentsSystemServiceProvider extends ServiceProvider
{
    
    public function boot(Dispatcher $events)
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'comments');


        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/comments'),
        ], 'comments-views');

        $this->publishes([
            __DIR__ . '/migrations' => database_path('migrations'),
        ], 'comments-migrations');


        
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');   
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add([
                'icon'    => 'file',
                'text'    => 'Comments',
                'url'     => route('admin.comments'),
            ]);

        });
    }


    public function register()
    {

        $this->app->make('comments\commentssystem\CommentsController');

    }
}
