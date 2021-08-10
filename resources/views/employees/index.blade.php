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
                    <th>Contacts</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <?php $count =1; ?>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $employee->name . ' ' . $employee->surname }}</td>
                    <td style="font-weight: bold" ><?php 
                            $contacts = "Phone: $employee->phone  \n Email: $employee->email";
                        ?>
                        {!! nl2br(e($contacts))!!}
                    </td>
                    <td>
                        @if(Auth::user()->id===1)
                        <form action={{ route('employee.destroy', $employee->id) }} method="POST">
                            <a class="btn btn-success" href={{ route('employee.edit', $employee->id) }}>Edit</a>
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
            <a href="{{ route('employee.create') }}" class="btn btn-success">Create</a>
            @endif
        </div>
    </div>
@endsection