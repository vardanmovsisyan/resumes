@extends('layouts.app')

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
        @endforeach
    @endif
    <h3 class="text-center">Add a New Resume!</h3>
    <form action="{{route('resume.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="keywords">Keywords</label>
            <textarea name="keywords" id="keywords" class="form-control" placeholder="e.g. html, ysu, 19, etc."></textarea>
        </div>
        <div class="form-group">
            <label for="resume">Resume</label>
            <input type="file" name="resume" id="resume" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Add</button>
        </div>
    </form>
@endsection