@extends('../layouts.sbadmin2')

@section('content')
<!-- Begin Page Content -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<style type="text/css">
	#itemList > ul{
		    padding: 5px 10px;
	}
	#itemList > ul > li{
		    border-bottom: 1px solid #d4d2e4;
		    padding: 3px 0;
	}
	.highlight{
		background-color: #ccc;
	}
</style>
<div class="container-fluid">
  <a href="{{ '/home' }}" class="main-title-w3layouts mb-2 float-right"><i class="fa fa-arrow-left"></i>  Back</a>
  <h5 class="main-title-w3layouts mb-2">Select Items</h5>
  <div class="card shadow mt-3">
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <form autocomplete="off">
        <div class="row">
        	<div class="col-md-3"></div>
        	<div class="col-md-6">
	        	<div class="form-group">
	        		<input type="text" name="search" id="searchItem" class="form-control" placeholder="Search Items...">
	        		<div id="itemList"></div>
	        	</div>
	        	@csrf
	        </div>
	        <div class="col-md-3"></div>
	      </div>
	    	</form>
	      <div class="row">
					<div class="col-md-12">
							<table class="table table-border" width="100%" id="userTable">
								<thead>
									<tr>
										<th>#Item</th>
										<th>Name</th>
										<th>Quantity</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="purchBody">
									@include('purchase.display_item')
								</tbody>
							</table>
					</div>
        </div>
	  </div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
 	$('#searchItem').keyup(function(){ 
    var query = $(this).val();
    if(query != '')
    {
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url:"{{ route('fetch') }}",
        method:"POST",
        data:{query:query, _token:_token},
        success:function(data){
         	$('#itemList').fadeIn();  
          $('#itemList').html(data);
        }
      });
    }
    else
    {
    	$('#itemList').fadeOut();
    }
  });
	
	$(document).on('click', 'li', function(){ 
		$('#searchItem').val($(this).text()); 
    $('#itemList').fadeOut(); 
    var value = $('#searchItem').val();
    var res = value.split("|");
    var final = res[1];
    if(final != '')
    {
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url:"{{ route('purchase.store') }}",
        method:"POST",
        data:{item_number:final, _token:_token},
        success:function(data){
        	if(data != 'Item already taken')
        	{
         		$('#searchItem').val('');
			    	$('#purchBody').empty().html(data);
			    }
			    else
			    {
			    	$('#searchItem').val('');
			    	alert(data);
			    }
        }
      });
    }
  });  
});
</script>
<script>
function myFunction(id) {
	var qty = $('#chngQty'+id).val();
	var _token = $('input[name="_token"]').val();
	$.ajax({
    url:"{{ route('updateQty') }}",
    method:"POST",
    data:{quantity:qty, id:id, _token:_token},
    success:function(data){
    	
    }
  });
	//alert(str);
}
</script>
@endsection