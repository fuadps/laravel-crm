@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-success mb-2" href="{{ route('employees.create') }}">Create new employee</a>
            <table class="table table-striped">
                <thead>
                    <th class="scope">First Name</th>
                    <th class="scope">Last Name</th>
                    <th class="scope">Company</th>
                    <th class="scope">Email</th>
                    <th class="scope">Phone</th>
                    <th class="scope"></th>
                </thead>
                <tbody>
                    @forelse($employees as $employee)
                    <tr>
                        <td> {{ $employee->first_name }}</td>
                        <td> {{ $employee->last_name }}</td>
                        <td> {{ $employee->company->name }}</td>
                        <td> {{ $employee->email }}</td>
                        <td> {{ $employee->phone }}</td>
                        <td> 
                            <div class="d-flex">
                                <a class="btn btn-primary mr-2" href="{{ route('employees.edit',$employee->id) }}">Edit</a>
                                <form action="{{ route('employees.destroy',$employee->id) }}" method="post" >
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                            
                        </td>
                    </tr>  
                    @empty
                        <tr>
                            <td colspan="6" class="text-center lead">No employees available</td>
                        </tr>              
                    @endforelse
                </tbody>
            </table>
            {{ $employees->links() }}
        </div>
    </div>
@endsection