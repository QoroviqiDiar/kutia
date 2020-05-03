@csrf
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$model->name}}">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{$model->email}}">
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="text" class="form-control  @error('password') is-invalid @enderror" name="password" value="{{$model->password}}">
    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

@foreach($roles as $role)
    <div class="checkbox">
        <label for="checkbox">
            <input type="checkbox" name="roles[]"
                   value="{{ $role->id }}" class="@error('roles') is-invalid @enderror"
                {{ $model->hasRole($role->name) ? 'checked' : ''}}>
            {{ $role->name }}
        </label>
        @error('roles')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
@endforeach

<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Submit">
</div>
