@extends('layouts.admin')

@section('contents')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card iq-realease">
                    <div class="iq-card-header d-flex justify-content-between border-0">
                        <div class="iq-header-title">
                            <h4 class="card-title">New Realeases</h4>
                        </div>
                    </div>
                    <div class="iq-card-body  iq-realeses-back">
                        <div class="row">
                            <div class="col-lg-5 iq-realese-box ">
                                <div class="iq-music-img">
                                    <div class="equalizer">
                                        <span class="bar bar-1"></span>
                                        <span class="bar bar-2"></span>
                                        <span class="bar bar-3"></span>
                                        <span class="bar bar-4"></span>
                                        <span class="bar bar-5"></span>
                                    </div>
                                </div>
                                <div class="player1 row">
                                    <div class="details1 music-list col-6 col-sm-6 col-lg-6">
                                        <div class="now-playing1"></div>
                                        <div class="track-art1"></div>
                                        <div>
                                            <div class="track-name1">Amy Winehouse </div>
                                            <div class="track-artist1">DaBaby Featuring Roddy</div>
                                        </div>
                                    </div>
                                    <div class="buttons1 col-6 col-sm-2 col-lg-3">
                                        <div class="prev-track1" onclick="prevTrack1()"><i class="fa fa-step-backward fa-2x"></i></div>
                                        <div class="playpause-track1" onclick="playpauseTrack1()"><i class="fa fa-play-circle fa-3x"></i></div>
                                        <div class="next-track1" onclick="nextTrack1()"><i class="fa fa-step-forward fa-2x"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <ul class="list-unstyled iq-song-slide mb-0 realeases-banner">
                                    <li class="row">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="media align-items-center col-10 col-md-5">
                                                <div class="iq-realese-song ">
                                                    <a href ="music-player.html"><img src="images/dashboard/realease-song/01.png" class="img-border-radius avatar-60 img-fluid" alt=""></a>
                                                </div>
                                                <div class="media-body text-white ml-3">
                                                    <p class="mb-0 iq-music-title">DJ Khaled Featuring</p>
                                                    <small>Edyta Gorniak</small>
                                                </div>
                                            </div>
                                            <p class="mb-0 col-md-2  iq-m-time">9:52</p>
                                            <p class="mb-0 col-md-2 iq-m-icon"><i class="lar la-star font-size-20"></i></p>
                                            <p class="mb-0 col-2 col-md-2"><i class="las la-play-circle font-size-32"></i></p>
                                            <div class="iq-card-header-toolbar iq-music-drop d-flex align-items-center  col-md-1">
                                                <div class="dropdown">
                                                    <span class="dropdown-toggle text-primary" id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false" role="button">
                                                        <i class="ri-more-2-fill text-primary"></i>
                                                    </span>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1" style="">
                                                        <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                                        <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                        <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <div class="iq-header-title">
                            <h4 class="card-title">Favorite Albums</h4>
                        </div>
                        <div id="feature-album-slick-arrow" class="slick-aerrow-block"></div>
                    </div>
                    <div class="iq-card-body">
                        <get-favorite-album></get-favorite-album>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <div class="iq-header-title">
                            <h4 class="card-title">Favorite Artists</h4>
                        </div>
                        <div id="feature-album-artist-slick-arrow" class="slick-aerrow-block"></div>
                    </div>
                    <div class="iq-card-body">
                        <get-favorite-artist></get-favorite-artist>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
