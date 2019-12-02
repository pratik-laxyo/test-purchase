<?php //echo '<pre>'; print_r($purchases); die; ?>
@foreach($purchases as $purchase)
	<tr>
		<td>{{ $purchase->item_number }}</td>
		<td>{{ $purchase->item_name->title }}</td>
		<td>
			<input id="chngQty{{ $purchase->id }}" min="1" type="number" value="{{ $purchase->quantity }}" style="width:50px" onchange="myFunction({{ $purchase->id }})"> {{ $purchase->item_name->unit->name }}
			<input type="hidden" name="purchase_id" id="purchase_id" value="{{ $purchase->id }}">
		</td>
		<td>
			<form action="{{ route('purchase.destroy',$purchase->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
      </form>
		</td>
	</tr>
@endforeach