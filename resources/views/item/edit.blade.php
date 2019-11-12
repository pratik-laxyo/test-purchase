@extends('../layouts.sbadmin2')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Warning!</strong> Please check your input code<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('item.update',$item->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Item Number</label>
                        <input type="text" class="form-control" value="{{ $item->item_number }}" readonly="">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Select Unit</label>
                        <select name="unit_id" class="form-control">
                            <option disabled="" selected="">Select Units</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id }}" @if($unit->id == $item->unit_id) selected @endif>{{ $unit->quantity }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Select Category</label>
                        <select name="category_id" class="form-control">
                            <option disabled="" selected="">Select Category</option>
                            @foreach ($category as $categorys)
                                <option value="{{ $categorys->id }}" @if($categorys->id == $item->category_id) selected @endif>{{ $categorys->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Select Location</label>
                        <select name="location_id" class="form-control">
                            <option disabled="" selected="">Select Location</option>
                            @foreach ($location as $locations)
                                <option value="{{ $locations->id }}" @if($locations->id == $item->location_id) selected @endif>{{ $locations->location }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="5">{{ $item->description }}</textarea>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection