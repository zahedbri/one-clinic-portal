<?php
    $title = Auth::user()->name.' - Profile';
    function setActive($data)
    {
      if ($data === 'profile')
      {
        return 'active';
      }
    }
?>
@extends('layouts.dashboard-layout')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Edit Profile</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="/user/profile/edit" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Hospital Name</label>
                      <input type="text" class="form-control" disabled value="{{$hospital}}">
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">Phone Number</label>
                        <input type="text" @error('phone_number') is-invalid @enderror value="{{$profile->phone_number}}" class="form-control" name="phone_number" required>
                      </div>

                      @error('phone_number')
                          <span class="text-danger">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">Position in Hospital</label>
                        <input type="text" @error('position') is-invalid @enderror value="{{$profile->position}}" class="form-control" name="position">
                      </div>
                    </div>

                    @error('position')
                          <span class="text-danger">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                  </div>
                  
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Fist Name</label>
                      <input type="text" @error('first_name') is-invalid @enderror value="{{$profile->first_name}}" class="form-control" name="first_name" required>
                    </div>
                    @error('first_name')
                    <span class="text-danger">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Last Name</label>
                      <input type="text" @error('last_name') is-invalid @enderror value="{{$profile->last_name}}" class="form-control" name="last_name" required>
                     
                    </div>
                    @error('last_name')
                    <span class="text-danger">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Address</label>
                      <input type="text" @error('address') is-invalid @enderror value="{{$profile->address}}" class="form-control" name="address" required>
                    </div>
                  </div>

                  @error('address')
                          <span class="text-danger">
                            <strong>{{ $message }}</strong>
                          </span>
                  @enderror
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">City</label>
                      <input type="text" @error('city') is-invalid @enderror value="{{$profile->city}}" class="form-control" name="city" required>
                    </div>

                    @error('city')
                          <span class="text-danger">
                            <strong>{{ $message }}</strong>
                          </span>
                    @enderror
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">State</label>
                      <input type="text" @error('state') is-invalid @enderror value="{{$profile->state}}" class="form-control" name="state" required>
                    </div>

                    @error('state')
                          <span class="text-danger">
                            <strong>{{ $message }}</strong>
                          </span>
                    @enderror
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Gender</label>
                          <select @error('gender') is-invalid @enderror class="form-control" name="gender">
                            <option value="{{$profile->gender}}">
                              @if (empty ($profile->gender))
                                Choose... 
                              @else
                                {{$profile->gender}}
                              @endif
                            </option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                          </select>
                        </div> 
                        
                        @error('gender')
                          <span class="text-danger">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Country</label>
                        <select id="country" @error('country') is-invalid @enderror name="country" required class="form-control">
                          <option value="{{$profile->country}}">{{$profile->country}}</option>
                          @foreach ($country as $country)
                          <option value="{{$country->name}}">{{$country->name}}</option>
                          @endforeach
                        </select>
                        @error('country')
                          <span class="text-danger">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                    <br>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        @if (!empty($profile->picture))
                            <img class="img-fluid img-thumbnail" src="/storage/images/{{$profile->picture}}" />
                        @endif  
                    </div>
                    <div class="col-md-5">
                        <label>Change Picture (maximum 1 mb)</label>
                        <input type="file" @error('picture') is-invalid @enderror class="btn btn-primary" name="picture">
                        @error('picture')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>                  
                <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection