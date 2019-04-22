@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-4">
            <form method="post" action="{{ route('employees.store') }}" >
                @csrf
                <div class="form-group">
                    <label>First Name : </label>
                    <input class="form-control" name="first_name" type="text" value="{{  old('first_name') }}" required>
                </div>
                <div class="form-group">
                    <label>Last Name : </label>
                    <input class="form-control" name="last_name" type="text" value="{{ old('last_name') }}" required>
                </div>
                <div class="form-group">
                    <label>Company : </label>
                    <select name="company_id" class="form-control" required>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                        
                    </select>
                </div>
                <div class="form-group">
                    <label> Email : </label>
                    <input class="form-control" name="email" type="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label>Phone : </label>
                    <input class="form-control" name="phone" type="text" value="{{ old('phone') }}" required>
                </div>

                <button class="btn btn-success btn-block" type="submit">Create Employee</button>

            </form>
        </div>
    </div>
@endsection