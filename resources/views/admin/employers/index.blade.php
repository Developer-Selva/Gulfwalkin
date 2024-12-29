@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manage Employers</h1>
        @foreach ($employers as $employer)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $employer->company_name }}</h5>
                    <p class="card-text">{{ $employer->email }}</p>
                    <a href="{{ route('admin.approve.employer', $employer->id) }}" class="btn btn-success">Approve</a>
                    <a href="{{ route('admin.reject.employer', $employer->id) }}" class="btn btn-danger">Reject</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
