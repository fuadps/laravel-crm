@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-4">
            <form method="post" action="{{ route('company.employees.store',$company->id) }}" >
                @csrf
                <div class="form-group">
                    <label>First Name : </label>
                    <input class="form-control" name="first_name" type="text" required>
                </div>
                <div class="form-group">
                    <label>Last Name : </label>
                    <input class="form-control" name="last_name" type="text" required>
                </div>
                <div class="form-group">
                    <label> Email : </label>
                    <input class="form-control" name="email" type="email" required>
                </div>

                <div class="form-group">
                    <label>Phone : </label>
                    <input class="form-control" name="phone" type="text" required>
                </div>

                <button class="btn btn-success btn-block" type="submit">Create Employee</button>

            </form>
        </div>
    </div>
@endsection