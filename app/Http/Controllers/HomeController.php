<?php

namespace App\Http\Controllers;

use App\Repositories\Page\PageRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct(PageRepositoryInterface $pageRepository)
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front.index');
    }
}
