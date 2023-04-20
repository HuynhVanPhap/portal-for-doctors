@extends('admin.master')

@section('title')
    Cập nhật Bác sĩ
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
                action="{{ route('doctors.update', $doctor->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <div class="col-2">
                        <img class="img-lg rounded-circle " src="{{ asset(config('constraint.link.image.avatar').$doctor->image) }}" alt="">
                    </div>

                    <div class="col-10">
                        <label for="exampleInputName1">Doctor's Name</label>
                        <input
                            type="text"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            id="exampleInputName1"
                            placeholder="Name"
                            name="name"
                            value="{{ $doctor->name }}"
                        >
                    </div>

                    @if ($errors->has('name'))
                        <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <input type="file" name="image" class="file-upload-default {{ $errors->has('image') ? 'is-invalid' : '' }}">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info {{ $errors->has('image') ? 'is-invalid' : '' }}" disabled="" placeholder="Doctor's Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                    </div>

                    @if ($errors->has('image'))
                        <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('image') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Room No</label>
                    <input
                        type="text"
                        class="form-control {{ $errors->has('room_id') ? 'is-invalid' : '' }}"
                        id="exampleInputName1"
                        placeholder="Input the room number"
                        name="room_id"
                        value="{{ $doctor->room_id }}"
                    >

                    @if ($errors->has('room_id'))
                        <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('room_id') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Phone</label>
                    <input
                        type="number"
                        class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                        id="exampleInputEmail3"
                        placeholder="Phone"
                        name="phone"
                        value="{{ $doctor->phone }}"
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
                        'defaultValue' => config('constraint.speciality.'.$doctor->speciality)
                    ])
                </div>

                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-dark">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection
