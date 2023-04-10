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
            <h4 class="card-title">Basic form elements</h4>
            <form
                class="forms-sample"
                action="{{ route('doctors.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf

                <div class="form-group">
                    <label for="exampleInputName1">Room No</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Input the room number" name="room_id">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Doctor's Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Phone</label>
                    <input type="number" class="form-control" id="exampleInputEmail3" placeholder="Phone" name="phone">
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">Speciality</label>
                    <select class="form-control" id="exampleSelectGender" name="speciality">
                        <option>---Select---</option>
                        <option value="skin">Skin</option>
                        <option value="heart">Heart</option>
                        <option value="eye">Eye</option>
                        <option value="nose">Nose</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Doctor's Image</label>
                    <input type="file" name="image" class="file-upload-default">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-dark">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection
