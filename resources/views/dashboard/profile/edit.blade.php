@extends('layouts.admin')

@section('contents')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-body p-0">
                    <div class="iq-edit-list">
                        <ul class="iq-edit-profile d-flex nav nav-pills">
                            <li class="col-md-6 p-0">
                                <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                    Personal Information
                                </a>
                            </li>
                            <li class="col-md-6 p-0">
                                <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                    Change Password
                                </a>
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="iq-edit-list-data">
                    <div class="tab-content">
                    <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Personal Information</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form action="{{ route('dashboard.profile.information') }}" 
                                enctype="multipart/form-data"
                                method="POST">

                                {{ csrf_field() }}
                                
                                    <div class="form-group row align-items-center">
                                        <div class="col-md-4">
                                            <div class="profile-img-edit">
                                                <img class="profile-pic" src="{{ Auth::user()->google_avatar }}" alt="profile-pic">
                                                <div class="p-image">
                                                    <i class="ri-pencil-line upload-button"></i>
                                                    <input class="file-upload" type="file" accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="uname">User Name:</label>
                                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="uname">User Email:</label>
                                            <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class=" row align-items-center">
                                        <div class="form-group col-sm-4">
                                            <label for="fname">First Name: <code>*</code></label>
                                            <input type="text" class="form-control" value="{{ $userData?->firstname }}" name="fname" required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="lname">Middle Name:</label>
                                            <input type="text" class="form-control" value="{{ $userData?->middlename }}" name="mname">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="lname">Last Name: <code>*</code></label>
                                            <input type="text" class="form-control" value="{{ $userData?->lastname }}" name="lname" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="dob">Phone Number: <code>*</code></label>
                                            <input class="form-control" type="text" value="{{ $userData?->tel }}" name="tel" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="cname">Country:</label>
                                            <input type="text" class="form-control" value="{{ $userData?->country }}" name="country">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="d-block">Gender:</label>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="genderMale" name="gender" value="Male" class="custom-control-input">
                                                <label class="custom-control-label" for="genderMale"> Male </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="genderFemale" name="gender" value="Female" class="custom-control-input">
                                                <label class="custom-control-label" for="genderFemale"> Female </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="dob">Date Of Birth: <code>*</code></label>
                                            <input class="form-control" type="date" value="{{ $userData?->bd }}" name="dob" required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Age:</label>
                                            <select class="form-control" name="age">
                                                <option value="{{ $userData?->age }}" selected>{{ $userData?->age }}</option>
                                                <option value="12-18">12-18</option>
                                                <option value="19-32">19-32</option>
                                                <option value="33-45">33-45</option>
                                                <option value="46-62">46-62</option>
                                                <option value="63">63 &gt; </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>About: <code>*</code></label>
                                            <textarea class="form-control" name="about" rows="5" style="line-height: 22px;" required>{{ $userData?->about }}</textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                    <button type="submit" class="btn btn-primary mr-2 pull-right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Change Password</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form action="{{ route('dashboard.password.reset') }}" 
                                enctype="multipart/form-data"
                                method="POST">

                                {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="password_old">Current Password: <code>*</code></label>
                                        <a href="javascript:;" class="float-right">Forgot Password</a>
                                        <input type="Password" class="form-control" id="password_old" name="password_old" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">New Password: <code>*</code></label>
                                        <input type="Password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password: <code>*</code></label>
                                        <input type="Password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                    </div>
                                    <hr>
                                    <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                    <button type="submit" class="btn btn-primary mr-2 pull-right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
