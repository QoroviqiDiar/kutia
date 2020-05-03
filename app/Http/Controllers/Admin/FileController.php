<?php

namespace App\Http\Controllers\Admin;

use App\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\FileRequest;
use App\Repositories\File\FileRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{

    private $fileRepository;

    public function __construct(FileRepositoryInterface $fileRepository)
    {
        $this->fileRepository = $fileRepository;
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = $this->fileRepository->getAll();
        return view('admin.files.index', ['files' => $files]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.files.create', ['model' => new File()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(FileRequest $request)
    {
        $file = $request->file('file');
        $data = $this->fileRepository->saveFile($file, $request->all());
        $this->fileRepository->create($data);
        return redirect()->route('files.index')->with('success', 'File created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     */
    public function destroy(File $file)
    {
        if (!Auth::user()->isAdminOrEditor()){
            return redirect()->route('files.index')->with('status', "You don't have permission!");
        }

        $this->fileRepository->delete($file);
        return redirect()->route('files.index')->with('success', 'File was successfully deleted');
    }
}
