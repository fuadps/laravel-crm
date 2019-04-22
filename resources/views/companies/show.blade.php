@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-success mb-2" href="{{ route('company.employees.create',$company->id) }}">Create new employee</a>
            <div class="card">
                <div class="card-header lead">
                    Company : {{ $company->name }}
                </div>
                <div class="card-body">
                    <h5>Employees List</h5>
                    <table class="table table-hover">
                        <thead>
                            <th class="scope">First Name</th>
                            <th class="scope">Last Name</th>
                            <th class="scope">Company</th>
                            <th class="scope">Email</th>
                            <th class="scope">Phone</th>
                            <th class="scope"></th>
                        </thead>
                        <tbody>
                            @forelse ($company->employees as $employee)
                                <tr>
                                    <td> {{ $employee->first_name }}</td>
                                    <td> {{ $employee->last_name }}</td>
                                    <td> {{ $employee->company->name }}</td>
                                    <td> {{ $employee->email }}</td>
                                    <td> {{ $employee->phone }}</td>
                                    <td> 
                                        <div class="d-flex">
                                            <a class="btn btn-primary mr-2" href="{{ route('company.employees.edit',[$employee->company->id,$employee->id]) }}">Edit</a>
                                            <form action="{{ route('company.employees.destroy',[$employee->company->id,$employee->id]) }}" method="post" >
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                        
                                    </td>
                                </tr>
                                
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No employee available</td>
                                </tr>  
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection