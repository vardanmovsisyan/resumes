@extends('layouts.app')

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
        @endforeach
    @endif
    <h3 class="text-center">Find Resumes!</h3>
    <form action="{{route('resume.search')}}" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control">
            </div>
            <div class="col">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control">
            </div>
            <div class="col">
                <label for="keywords">Keywords</label>
                <textarea name="keywords" id="keywords" class="form-control" placeholder="e.g. html, ysu, 19, etc."></textarea>
            </div>
            <div class="col align-self-center">
                <button type="submit" class="btn btn-info">Search</button>
            </div>
        </div>
    </form>
    @if(isset($people))
        @if(!count($people))
            <div class="alert alert-danger" role="alert">
                No resumes are found. Please try again with other parameters!
            </div>
        @else
            <table class="table table-striped">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Keywords</th>
                    <th>Download Resume</th>
                </tr>
                @foreach($people as $person)
                    <tr>
                        <td>{{$person->first_name}}</td>
                        <td>{{$person->last_name}}</td>
                        <td>{{$person->keywords}}</td>
                        <td>
                            <a href="{{asset($person->resume)}}" download="{{preg_split("/\d{10}/", asset($person->resume))[1]}}" class="btn btn-dark">Download</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    @endif
@endsection