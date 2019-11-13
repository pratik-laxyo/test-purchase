@extends('../layouts.sbadmin2')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  <a href="{{ '/home' }}" class="main-title-w3layouts mb-2 float-right"><i class="fa fa-arrow-left"></i>  Back</a>
  <h5 class="main-title-w3layouts mb-2">Item Listing</h5>
  <div class="card shadow mt-3">
    <div class="card-body">
      <div class="table-responsive">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Item Number</th>
              <th>Title</th>
              <th>Category</th>
              <th>Unit</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if (!empty($items))
              @foreach ($items as $row)
              <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $row->item_number }}</td>
                <td>{{ $row->title }}</td>
                @foreach ($category as $categorys)
                    @if ($row->category_id == $categorys->id)
                        <td>{{ $categorys->name }}</td>
                    @endif
                @endforeach
                @foreach ($units as $unit)
                    @if ($row->unit_id == $unit->id)
                        <td>{{ $unit->name }}</td>
                    @endif
                @endforeach
                <td>
                  @if(strlen($row->description) >= 200)
                    {{ substr($row->description,0,200).'..... ' }} <b>Read More</b>
                  @else
                    {{ $row->description }}
                  @endif
                </td>
                <td>
                  <form action="{{ route('item.destroy',$row->id) }}" method="POST">
                    <a class="btn btn-success" href="{{ route('item.show',$row->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('item.edit',$row->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            @endif
          </tbody>
        </table>
        {!! $items->links() !!}
      </div>
    </div>
  </div>
</div>
@endsection