@extends('layouts.app')
@section('content')
    <div class="card-body container">
            @if (session('status_success'))
            <p style="color: green"><b>{{ session('status_success') }}</b></p>
        @else
            <p style="color: red"><b>{{ session('status_error') }}</b></p>
        @endif
        
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Employees</th>
                    <th>Projects</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <?php $count = 1; ?>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>
                        @foreach ($project->employees as $employee)
                            <?php $string = "$employee->name  $employee->surname"; ?>
                            {{ $string }}
                            @if (!$loop->last)
                                {{ ', ' }}
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $project->name }}</td>
                    <td>{!! $project->description !!}</td>
                    <td>
                    @if(Auth::user()->id===1)
                        <form action={{ route('project.destroy', $project->id) }} method="POST">
                            <a class="btn btn-success" href={{ route('project.edit', $project->id) }}>Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete" />
                        </form>
                    @endif    
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            @if(Auth::user()->id===1)
                <a href="{{ route('project.create') }}" class="btn btn-success">Create</a>
            @endif
        </div>
    </div>
@endsection