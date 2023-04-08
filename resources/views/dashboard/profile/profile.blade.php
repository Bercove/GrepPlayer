@extends('layouts.admin')

@section('contents')
    <div class="container-fluid">
        <div class="row profile-content">
            <div class="col-12 col-md-12 col-lg-6">
                <div class="iq-card">
                    <div class="iq-card-body profile-page">
                        <div class="profile-header">
                        <div class="cover-container text-center">
                            <img src="{{ Auth::user()->google_avatar }}" alt="profile-bg" class="rounded-circle img-fluid">
                            <div class="profile-detail mt-3">
                                <h3>{{ Auth::user()->name }}</h3>
                                <p class="text-primary">{{ Auth::user()->email }}</p>
                                <p class="text-justify">
                                    {{ $userData?->about }}
                                </p>
                            </div>
                            <div class="iq-social d-inline-block align-items-center">
                                <ul class="list-inline d-flex p-0 mb-0 align-items-center">
                                    <li>
                                    <a href="{{ config('setup.AUTHOR.NAME.BERCOVE.FACEBOOK') }}" class="avatar-40 rounded-circle bg-primary mr-2 facebook">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                    </li>
                                    <li>
                                    <a href="{{ config('setup.AUTHOR.NAME.BERCOVE.TWITTER') }}" class="avatar-40 rounded-circle bg-primary mr-2 twitter">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                    </li>
                                    <li>
                                    <a href="{{ config('setup.AUTHOR.NAME.BERCOVE.YOUTUBE') }}" class="avatar-40 rounded-circle bg-primary mr-2 youtube">
                                        <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                    </a>
                                    </li>
                                    <li>
                                    <a href="{{ config('setup.AUTHOR.NAME.BERCOVE.PINTEREST') }}" class="avatar-40 rounded-circle bg-primary pinterest">
                                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                    </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between align-items-center mb-0">
                        <div class="iq-header-title">
                        <h4 class="card-title mb-0">Personal Details</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <ul class="list-inline p-0 mb-0">
                            <li>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6>First Name</h6>
                                    <p class="mb-0">{{ $userData?->firstname }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6>Middle Name</h6>
                                    <p class="mb-0">{{ $userData?->middlename }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6>Last Name</h6>
                                    <p class="mb-0">{{ $userData?->lastname }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6>Phone</h6>
                                    <p class="mb-0">{{ $userData?->tel }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6>Birth Day</h6>
                                    <p class="mb-0">{{ $userData?->bd }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6>Gender</h6>
                                    <p class="mb-0">{{ $userData?->gender }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6>Age</h6>
                                    <p class="mb-0">{{ $userData?->age }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6>Country</h6>
                                    <p class="mb-0">{{ $userData?->country }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection