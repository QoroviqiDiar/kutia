@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="user-edit">
                    <h1 class="user-edit__title">
                        Edit Page: {{ $model->name }}
                    </h1>

                    <div class="user-edit__form">
                        <form action="{{ route('users.update', ['user' => $model->id]) }}" method="POST">
                            @method('PUT')
                            @csrf

                            @foreach($roles as $role)
                                <div class="checkbox">
                                    <label for="content">
                                        <input type="checkbox" name="roles[]"
                                               value="{{ $role->id }}"
                                            {{ $model->hasRole($role->name) ? 'checked' : ''}}>
                                        {{ $role->name }}
                                    </label>
                                </div>
                            @endforeach

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
