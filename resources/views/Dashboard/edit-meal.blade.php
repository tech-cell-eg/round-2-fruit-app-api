@extends('layout.app-dashboard')

@section('title', $title)

@push('css')
@endpush


@section('content')
    <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Update The Meal</div>
        </div> <!--end::Header--> <!--begin::Form-->
        <form action="{{route('dashboard.update-meal', $meal->id)}}" method="POST" enctype='multipart/form-data'> <!--begin::Body-->
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="mb-3"> <label for="Input_title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="Input_title" aria-describedby="emailHelp" value="{{old('title', $meal->title)}}">
                    @error('title')
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" id="price" step="0.01" value="{{old('price', $meal->price)}}">
                    @error('price')
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <span class="input-group-text">Description</span>
                    <textarea class="form-control" name="description" aria-label="With textarea">{{ old('description', $meal->description) }}</textarea>
                </div>
                @error('description')
                <span style="color: red;">{{ $message }}</span>
                @enderror
                <br>
                @if (!empty($meal->image_url))
                    <img src="{{asset('storage/' . $meal->image_url)}}" alt="profile_pic" style="width: auto; height: 100px;">
                @endif
                <div class="input-group mb-3">
                    <input type="file" name="image" class="form-control" id="inputImage">
                    <label class="input-group-text" for="inputImage">Upload</label>
                </div>
                @error('image')
                <span style="color: red;">{{$message}}</span>
                @enderror
            </div> <!--end::Body--> <!--begin::Footer-->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div> <!--end::Footer-->
        </form> <!--end::Form-->
    </div>
@endsection

@push('js')

@endpush
