@extends('admin.master')

@section('content-inner')
    @if ($result)
        <div class="alert alert-success">Post Added Successfully</div>
    @else
        <div class="alert alert-danger">Something is wrong</div>
    @endif

    {{-- @php
        header("Refresh: 3;" .  "URL=" . route('admin.posts'));
    @endphp --}}
@endsection
