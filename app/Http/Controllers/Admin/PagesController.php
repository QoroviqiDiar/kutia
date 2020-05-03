<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Page;
use App\Repositories\Page\PageRepositoryInterface;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    private $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->isAdminOrEditor()){
            $pages = $this->pageRepository->getAllWithPagination();
        } else {
            $pages = $this->pageRepository->getAllUserPagesWithPagination($user, 1);
        }
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
        return redirect()->route('pages.index')->with('success', "Page was created successfully");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     */
    public function edit(Page $page)
    {
        if (Auth::user()->cant('update', $page)) {
            return redirect()->route('pages.index');
        }
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
        if (Auth::user()->cant('update', $page)) {
            return redirect()->route('pages.index');
        }
        $this->pageRepository->update($page, $request->all());
        return redirect()->route('pages.index')->with('success', "$page->title was updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     */
    public function destroy(Page $page)
    {
        if (Auth::user()->cant('update', $page)) {
            return redirect()->route('pages.index');
        }
    }
}
