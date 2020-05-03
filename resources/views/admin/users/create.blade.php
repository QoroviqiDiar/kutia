@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Create User</h1>

                <form action="{{ route('users.store') }}" method="POST">
                    @include('admin.users.partials.fields')
                </form>
            </div>
        </div>
    </div>
@endsection
