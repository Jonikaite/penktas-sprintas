@extends('layouts.app')
@section('content')
<div class="container">
    @if($errors->any())
      <p style="color: red">{{$errors->first()}}</p>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-light bg-dark">Update Employee Information: </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('employee.update', $employee->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Name: </label>
                            <input type="text" name="name" class="form-control" required value="{{ $employee->name}}">
                        </div>
                        <div class="form-group">
                            <label for="">Surname: </label>
                            <input type="text" name="surname" class="form-control" required value="{{ $employee->surname }}">
                        </div>
                        <div class="form-group">
                            <label for="">Phone number: </label>
                            <input type="number" name="phone" class="form-control" value="{{ $employee->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="">E-mail address: </label>
                            <input type="email" name="email" class="form-control" value="{{ $employee->email }}">
                        </div>
                        <div class="form-group">
                            <label>Assign project: </label>
                            <select name="project_id" id="" class="form-control">
                                <option disabled selected> Choose project to assign</option>
                                @foreach ($projects as $project)
                                <option value="{{ $project->id }}" @if($project->id == $employee->project_id) selected="selected"  @endif>{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-dark">Update</button>
                        <a class="btn btn-dark" href="{{ URL::previous() }}">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection