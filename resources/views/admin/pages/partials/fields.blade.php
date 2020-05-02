@csrf
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$model->title}}">
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
<div class="form-group">
    <label for="Url">Url</label>
    <input type="text" class="form-control  @error('slug') is-invalid @enderror" name="slug" value="{{$model->slug}}">
    @error('slug')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="content">Content</label>
    <textarea name="content" id="content" class="form-control @error('slug') is-invalid @enderror">{{ $model->content }}</textarea>
    @error('content')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Submit">
</div>
