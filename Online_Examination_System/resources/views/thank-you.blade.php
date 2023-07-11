@extends('layout/layout-common')

@section('space-work')

<div class="container">
    <div class="text-center">
        <h2>Thanks for submit your exam, {{Auth::user()->name}}</h2>
        <p>We will revie your exam, and Update you soon by mail.</p>
        <a href="/dashboard" class="btn btn-info"> Go Back</a>
    </div>
</div>

@endsection