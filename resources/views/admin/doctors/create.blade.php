@extends('admin.master')

@section('title')
    Add Doctor
@endsection

@section('content')
@include('admin.layouts.header')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        @include('admin.layouts.success')
        @include('admin.layouts.fail')

        <div class="card-body">
            <form
                class="forms-sample"
                action="{{ route('doctors.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf

                <div class="form-group">
                    <label for="exampleInputName1">Room No</label>
                    <input
                        type="text"
                        class="form-control  {{ $errors->has('room_id') ? 'is-invalid' : '' }}"
                        id="exampleInputName1"
                        placeholder="Input the room number"
                        name="room_id"
                    >

                    @if ($errors->has('room_id'))
                        <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('room_id') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Doctor's Name</label>
                    <input
                        type="text"
                        class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        id="exampleInputName1"
                        placeholder="Name"
                        name="name"
                    >

                    @if ($errors->has('name'))
                        <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Phone</label>
                    <input
                        type="number"
                        class="form-control  {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                        id="exampleInputEmail3"
                        placeholder="Phone"
                        name="phone"
                    >

                    @if ($errors->has('phone'))
                        <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">Speciality</label>
                    @include('admin.layouts.selected', [
                        'name' => 'speciality',
                        'id' => 'exampleSelectGender',
                        'data' => config('constraint.speciality'),
                    ])
                </div>
                <div class="form-group">
                    <label>Doctor's Image</label>
                    <input
                        type="file"
                        name="image"
                        class="file-upload-default {{ $errors->has('image') ? 'is-invalid' : '' }}">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info {{ $errors->has('image') ? 'is-invalid' : '' }}" disabled="" placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                    </div>

                    @if ($errors->has('image'))
                        <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('image') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-dark">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection
