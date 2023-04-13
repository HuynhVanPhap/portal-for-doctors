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
                        <img class="img-lg rounded-circle " src="{{ asset('storage/avatar/'.$doctor->image) }}" alt="">
                    </div>

                    <div class="col-10">
                        <label for="exampleInputName1">Doctor's Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="exampleInputName1"
                            placeholder="Name"
                            name="name"
                            value="{{ $doctor->name }}"
                        >
                    </div>

                </div>

                <div class="form-group">
                    <input type="file" name="image" class="file-upload-default">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Doctor's Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Room No</label>
                    <input
                        type="text"
                        class="form-control"
                        id="exampleInputName1"
                        placeholder="Input the room number"
                        name="room_id"
                        value="{{ $doctor->room_id }}"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Phone</label>
                    <input
                        type="number"
                        class="form-control"
                        id="exampleInputEmail3"
                        placeholder="Phone"
                        name="phone"
                        value="{{ $doctor->phone }}"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">Speciality</label>
                    @include('admin.layouts.selected', [
                        'name' => 'speciality',
                        'id' => 'exampleSelectGender',
                        'data' => config('constraint.speciality'),
                        'defaultValue' => $doctor->speciality
                    ])
                </div>

                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-dark">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection
