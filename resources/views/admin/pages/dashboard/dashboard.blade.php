@extends('admin.master')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/admin.min.css') }}">
@endsection

@section('content-inner')
    <div class="main__content__inner">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="info-box">
                    <h4 class="info-box__title">Post</h4>
                    <span class="info-box__count">{{ $postsCount }}</span>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="info-box">
                    <h4 class="info-box__title">Comment</h4>
                    <span class="info-box__count">{{ $commentsCount }}</span>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="info-box">
                    <h4 class="info-box__title">User</h4>
                    <span class="info-box__count">{{ $usersCount }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
