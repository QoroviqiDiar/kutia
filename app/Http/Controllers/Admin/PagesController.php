<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Page;
use App\Repositories\Page\PageRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    private $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = $this->pageRepository->getAll();
        return view('admin.pages.index', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create')->with(['model' =>  new Page()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PageRequest
     */
    public function store(PageRequest $request)
    {
        $page = $this->pageRepository->save($request->all());
        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit',  ['model' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PageRequest
     * @param  \App\Page  $page
     */
    public function update(PageRequest $request, Page $page)
    {
        $this->pageRepository->update($page, $request->all());
        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
