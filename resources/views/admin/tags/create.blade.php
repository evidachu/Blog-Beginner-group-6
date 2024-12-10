@extends('layouts.admin')

@section('content')
<h1>Add Tag</h1>
<form action="{{ route('tags.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Tag Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Save</button>
</form>
@endsection
