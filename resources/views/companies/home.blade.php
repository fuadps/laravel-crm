@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-success mb-2" href="{{ route('companies.create') }}">Create new company</a>
            <table class="table table-striped">
                <thead>
                    <th class="scope">Name</th>
                    <th class="scope">Logo</th>
                    <th class="scope">Email</th>
                    <th class="scope">Website</th>
                    <th class="scope"></th>
                </thead>
                <tbody>
                    @forelse($companies as $company)
                    <tr class="center-td">
                        <td> {{ $company->name }}</td>
                        <td> <img src=" {{$company->getUrlPath()}}" class="logo-thumbnail" alt=""></td>
                        <td> {{ $company->email }}</td>
                        <td> {{ $company->website }}</td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-light" href="/companies/{{ $company->id }}">View</a>
                                <a class="btn btn-primary mx-1" href="{{ route('companies.edit',$company->id) }}">Edit</a>
                                <form action="{{ route('companies.destroy',$company->id) }}" method="post" >
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                            
                        </td>
                    </tr>  
                    @empty
                        <tr>
                            <td colspan="5" class="text-center lead">No company available</td>
                        </tr>              
                    @endforelse
                </tbody>
            </table>
            {{ $companies->links() }}
        </div>
    </div>
@endsection