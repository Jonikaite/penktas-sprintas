@extends('layouts.app')
@section('content')
<div class="container">
    @if($errors->any())
        <p style="color: red">{{$errors->first()}}</p>
    @endif
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header text-light bg-dark">Create Project:</div>
               <div class="card-body">
                   <form action="{{ route('project.store') }}" method="POST">
                       @csrf
                       <div class="form-group">
                            <label for="">Name: </label>
                            <input type="text"  required name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Description: </label>
                            <textarea id="mce" style= "height: 300px"type="text" name="description" class="form-control"> </textarea>
                        </div>

                       <button type="submit" class="btn btn-dark">Submit</button>
                       <a class="btn btn-dark" href="{{ URL::previous() }}">Back</a>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>

@endsection