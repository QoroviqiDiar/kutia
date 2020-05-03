@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Files <a href="{{ route('files.create') }}" class="btn btn-primary">Add File</a>
                </h2>
                @if(count($files) > 0)
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">File</th>
                            <th scope="col">Description</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($files as $file)
                            <tr>
                                <td>
                                    <a href="{{ $file->getFilePath($file->file) }}"
                                       target="_blank">{{ $file->original_name }}</a>
                                </td>
                                <td>{!! $file->description !!} </td>
                                <td>
                                    @if(Auth::user()->isAdminOrEditor())
                                        <form action="{{ route('files.destroy', ['file' => $file->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="col-12">
                        <h4 class="text-center">
                            No files found.
                        </h4>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
