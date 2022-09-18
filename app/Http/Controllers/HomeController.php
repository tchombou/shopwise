<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shopper\Framework\Repositories\Ecommerce\CategoryRepository;
use Shopper\Framework\Repositories\Ecommerce\ProductRepository;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view(
            'home',
            [
                'popular' => (new ProductRepository())
                    ->makeModel()
                    ->paginate(),
                'arrival' => (new ProductRepository())
                    ->makeModel()
                    ->orderBy('created_at', 'DESC')
                    ->paginate(),
                'categories' => (new CategoryRepository())
                    ->paginate(6),
            ]
        );
    }
}
