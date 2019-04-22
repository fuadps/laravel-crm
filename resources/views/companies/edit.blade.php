@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-4">
            <form method="post" action="{{ route('companies.update',$company->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label>Company Name : </label>
                    <input class="form-control" name="name" type="text" value="{{ $company->name }}" required>
                </div>
                <div class="form-group">
                    <label>Email : </label>
                    <input class="form-control" name="email" type="text" value="{{ $company->email }}" required>
                </div>
                <div class="form-group">
                    <label>Logo : </label>
                    <input class="form-control" name="logo" type="file">
                </div>

                <div class="form-group">
                    <label>Website : </label>
                    <input class="form-control" name="website" type="text" value="{{ $company->website }}" required>
                </div>

                <button class="btn btn-success btn-block" type="submit">Edit Company</button>

            </form>
        </div>
    </div>
@endsection