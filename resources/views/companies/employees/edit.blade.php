@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-4">
            <h3>Company : {{$employee->company->name}}</h3>
            <form method="post" action="{{ route('company.employees.update',[$employee->company->id,$employee->id]) }}" >
                @csrf
                @method('patch')
                <div class="form-group">
                    <label>First Name : </label>
                    <input class="form-control" name="first_name" type="text" value="{{ $employee->first_name }}" required>
                </div>
                <div class="form-group">
                    <label>Last Name : </label>
                    <input class="form-control" name="last_name" type="text" value="{{ $employee->last_name }}" required>
                </div>

                <div class="form-group">
                    <label> Email : </label>
                    <input class="form-control" name="email" type="email" value="{{ $employee->email }}" required>
                </div>

                <div class="form-group">
                    <label>Phone : </label>
                    <input class="form-control" name="phone" type="text" value="{{ $employee->phone }}" required>
                </div>

                <button class="btn btn-success btn-block" type="submit">Update Employee</button>

            </form>
        </div>
    </div>
@endsection