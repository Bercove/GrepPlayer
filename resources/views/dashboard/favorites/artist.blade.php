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
                    <get-favorite-artist></get-favorite-artist>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection