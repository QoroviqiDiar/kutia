@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pages">
                    <h1 class="pages__title">Pages <a href="{{ route('pages.create') }}" class="btn btn-primary">Create</a></h1>

                    <div class="pages__wrapper">

                        @if($pages)

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Url</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pages as $page)
                                    <tr>
                                        <th scope="row">{{ $page->id }}</th>
                                        <td>
                                            <a href="{{ route('pages.edit', ['page' => $page->id]) }}" class="pages__link--title">
                                                {{ $page->title }}
                                            </a>
                                        </td>
                                        <td>{{ $page->slug }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="pages__not-found">
                                <p>There are no pages.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
