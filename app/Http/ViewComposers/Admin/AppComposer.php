<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\View\View;
use App\Repositories\ImageResizeRepository;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class AppComposer
{
    /**
     * Create a new sidebar composer.
     *
     * @return void
     */
    protected $image_resize;

    public function __construct()
    {
        auth()->shouldUse('admin');
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $admin = auth()->user();
        // $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        // $uri_segments = explode('/', $uri_path);

        $view->with('admin', $admin);
    }
}
