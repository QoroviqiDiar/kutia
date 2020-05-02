@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-edit">
                    <h1 class="page-edit__title">
                        Edit Page: {{ $model->title }}
                    </h1>

                    <div class="page-edit__form">
                        <form action="{{ route('pages.update', ['page' => $model->id]) }}" method="POST">
                            @method('PUT')
                            @include('admin.pages.partials.fields')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
