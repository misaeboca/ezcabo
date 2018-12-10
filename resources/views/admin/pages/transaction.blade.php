@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
		 
		<h2>Transaction</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-shadow">
    	<div class="panel-body">          
         {!! Form::open(array('url' => 'admin/transaction','class'=>'form-inline filter','id'=>'search','role'=>'form','method'=>'get')) !!}	
            <span class="bold text-muted">Search</span>
            <div class="form-group">
                <input type="text" class="form-control" id="" name="keyword" placeholder="Search By Email,Trans ID">
            </div>             
            <div class="form-group">              
                <button type="submit" class="btn btn-default-dark  pull-right">Search</button>
            </div>
        {!! Form::close() !!}
    	</div>
	</div>
     
<div class="panel panel-default panel-shadow">
    <div class="panel-body table-responsive">
         
        <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
            <thead>
	            <tr>
	                <th>Property ID</th>
                    <th>Email</th>
                    <th>Transaction ID</th>
                    <th>Amount</th>	                
                    <th>Date</th>
	                 
	            </tr>
            </thead>

            <tbody>
            @foreach($transaction as $i => $trans)
         	   <tr>
            	<td>{{ $trans->property_id}}</td>            	 
                <td>{{ $trans->email}}</td>
                <td>{{ $trans->payment_id}}</td>
                <td>{{getcong('stripe_currency').' '.$trans->payment_amount}}</td>
                <td>{{ date('M,  jS, Y',$trans->date) }}</td>
                  
            </tr>
           @endforeach
             
            </tbody>
            <tfoot>
		        <tr>
		            <td colspan="8" class="text-center">
		            	@include('admin.pagination', ['paginator' => $transaction]) 
		                 
		            </td>
		        </tr>
        	</tfoot>
        </table>
    </div>
    <div class="clearfix"></div>
</div>

</div>



@endsection