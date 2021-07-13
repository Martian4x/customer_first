<?php

namespace App\Providers;

use App\Maincategory;
use App\Cart;
use App\Order;
use App\User;
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
        $this->composeMainMenu();
        $this->composeUserCarts();
        $this->composeUserOrders();
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

    // Compose main menu.
    private function composeMainMenu(){

        view()->composer(['layouts.header_nav','frontend.index'], function($view)
        {
            $maincategories['agricultural'] = Maincategory::whereType('Agriculture')->get();
            $maincategories['clothing'] = Maincategory::whereType('Clothing')->get();
            $maincategories['textile'] = Maincategory::whereType('Textile')->get();
            $maincategories['crafts'] = Maincategory::whereType('Craft')->get();
            $maincategories['mineral'] = Maincategory::whereType('Mineral')->get();
            $maincategories['manufacturing'] = Maincategory::whereType('Manufacturing')->get();
            $maincategories['electronic'] = Maincategory::whereType('Electronic')->get();

            $view->with('maincategories', $maincategories);
        });
    }

    // Compose a shopping cart.
    private function composeUserCarts(){

        view()->composer(['layouts.header_nav'], function($view)
        {
            if(\Auth::guest())
                $carts = Cart::whereUserId(null)->whereCreatedAt(null)->get();
            else
                $carts = \Auth::user()->carts()->whereOrderId(null)->get();

            $view->with('carts', $carts);
        });
    }

    // Compose a shopping cart.
    private function composeUserOrders(){

        view()->composer(['layouts.header_nav'], function($view)
        {
            if(\Auth::guest())
                $orders = Order::whereUserId(null)->whereCreatedAt(null)->get();
            else
                $orders = \Auth::user()->orders;

            $view->with('orders', $orders);
        });
    }
}
