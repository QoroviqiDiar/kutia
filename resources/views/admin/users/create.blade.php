@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-create">
                    <h1 class="page-create__title">
                        Edit Page aaa
                    </h1>

                    <div class="page-create__form">
                        <form action="{{ route('pages.store') }}" method="POST">
                            @include('admin.pages.partials.fields')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
