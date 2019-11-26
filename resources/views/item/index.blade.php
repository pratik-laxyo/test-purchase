@extends('../layouts.sbadmin2')

@section('content')
<!-- Begin Page Content -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
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
        <form id="addForm">
          @csrf
        <div class="row">
          <div class="form-group col-md-2"></div>
          <div class="form-group col-md-3">
              <select class="form-control" name="category">
                <option selected="" disabled="">Filter By Category</option>
                @foreach($category as $cat)
                  <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
              </select>    
          </div>
          <div class="form-group col-md-3">
              <select class="form-control" name="department">
                <option selected="" disabled="">Filter By Department</option>
                @foreach($department as $dept)
                  <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                @endforeach
              </select>    
          </div>
          <div class="form-group col-md-4">
            <button type="submit" name="submit" id="addUnit" class="btn btn-primary">Filter</button>
          </div>
        </div>
        </form>
        <br>
        <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Item Number</th>
              <th>Title</th>
              <th>Brand</th>
              <th>Department</th>
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
                <td>
                  @foreach ($brand as $brands)
                      @if ($row->brand == $brands->id)
                        {{ $brands->name }}
                      @endif
                  @endforeach
                </td>
                <td>
                  @foreach ($department as $departments)
                      @if ($row->department == $departments->id)
                        {{ $departments->name }}
                      @endif
                  @endforeach
                </td>
                <td>
                  @foreach ($category as $categorys)
                      @if ($row->category_id == $categorys->id)
                        {{ $categorys->name }}
                      @endif
                  @endforeach
                </td>
                <td>
                  @foreach ($units as $unit)
                      @if ($row->unit_id == $unit->id)
                        {{ $unit->name }}
                      @endif
                  @endforeach
                </td>
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

<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function () {
    $.noConflict();
    var table = $('#dataTables').DataTable();
});
</script>
<script>
$(document).ready(function() {
   $("#addForm").on('submit', function(e) {
      e.preventDefault();
    $.ajax({
          type: 'post',
          url: 'item',
          data: $('#addForm').serialize(),
          success: function(data) {
              alert(data);
              //location.reload();
          },
      });
  });
});
</script>
@endsection