@extends('layouts.admin')

@section('contents')
    
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between align-items-center">
                    <div class="iq-header-title">
                        <h4 class="card-title">Favorite Artists</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <ul class="list-unstyled row iq-box-hover mb-0">  
                        <div id="appVue">
                        <favorite-artist></favorite-artist>   
                    </div>

                        {{-- @foreach($artists as $artist)
                            
                            <li class="col-xl-2 col-lg-3 col-md-4 iq-music-box">
                                <div class="iq-card">
                                    <div class="iq-card-body p-0">

                                        @php
                                            $image = json_decode(json_encode($artist->image[4]), true);
                                        @endphp

                                        @if ($image != '' && !empty($image))
                                            <div class="iq-thumb">
                                                <div class="iq-music-overlay"></div>
                                                <a href="javascript:;">
                                                    <img src="{{ $image['#text'] }}" class="img-border-radius img-fluid w-100" alt="{{ $image['size'] }}">
                                                </a>
                                                <div class="overlay-music-icon">
                                                    <a href="javascript:;">
                                                        <i class="las la-play-circle"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="feature-list text-center">
                                            <p class="mb-0">{{ $artist->name }}</p>
                                        </div>

                                    </div>
                                </div>
                            </li>

                        @endforeach --}}

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection