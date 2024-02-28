@extends('admin.admin_layout')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Transport Form</h6>
                <form action="{{route('city.create')}}" method="POST">
                @csrf
                    <div class="mb-3">
                        <label for="province" class="form-label">Province</label>
                        <select class="form-select form-control" id="province" name="province" required>
                            <option value="" selected disabled>Select Province</option>
                            @foreach($existingProvince as $province)
                            <option value="{{$province->id}}">{{$province->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" name="city" id="city">
                    </div>
                    <div class="m-n2">
                    <button class="btn btn-primary rounded-pill m-2" type="button" style="padding: 5px 40px;">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection