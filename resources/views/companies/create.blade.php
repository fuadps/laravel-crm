@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-4">
            <form method="post" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Company Name : </label>
                    <input class="form-control" name="name" type="text" required>
                </div>
                <div class="form-group">
                    <label>Email : </label>
                    <input class="form-control" name="email" type="text" required>
                </div>
                <div class="form-group">
                    <label>Logo : </label>
                    <input class="form-control" name="logo" type="file" required>
                </div>

                <div class="form-group">
                    <label>Website : </label>
                    <input class="form-control" name="website" type="text" required>
                </div>

                <button class="btn btn-success btn-block" type="submit">Create Company</button>

            </form>
        </div>
    </div>
@endsection