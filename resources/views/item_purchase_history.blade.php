@extends('layouts.sbadmin2')

@section('content')

<div class="container-fluid">
  <a href="{{ '/home' }}" class="main-title-w3layouts mb-2 float-right"><i class="fa fa-arrow-left"></i>  Back</a>
  <h5 class="main-title-w3layouts mb-2">Item Purchase History</h5>
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Invoice Number</th>
              <th>Purchase Item</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if (!empty($purchase))
              @foreach ($purchase as $row)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->invoice_no }}</td>
                <td><?php $data = json_decode($row->items,true); echo count($data); ?></td>
                <td>{{ date("d-m-Y", strtotime($row->created_at)) }}</td>
                <td>
                	<a class="btn btn-success" href="{{ route('show',$row->id) }}" title="Show">See Invoice</a>
                </td>
              </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function () {
    $.noConflict();
    var table = $('#dataTables').DataTable();
});
</script>