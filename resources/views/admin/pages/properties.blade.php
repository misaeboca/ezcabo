@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
		
		<div class="pull-right">
			<a href="{{URL::to('submit-property')}}" class="btn btn-primary" target="_blank">Add Property <i class="fa fa-plus"></i></a>
		</div>
		<h2>Properties</h2>
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
         {!! Form::open(array('url' => 'admin/properties','class'=>'form-inline filter','id'=>'search','role'=>'form','method'=>'get')) !!}	
            <span class="bold text-muted">Search</span>
            <div class="form-group">
                <input type="text" class="form-control" id="" name="keyword" placeholder="Title, Address...">
            </div>             
            <div class="form-group">
                <select name="purpose" id="basic" class="selectpicker show-tick form-control" data-live-search="false">
                   <option value="">Property Purpose</option>
                   <option value="Sale">For Sale</option>
                   <option value="Rent">For Rent</option>
                </select>
            </div>
            <div class="form-group">
                <select id="proeprty-type" name="type" class="selectpicker show-tick form-control" data-live-search="false">
                  <option value="">Property Type</option>
                  @foreach(\App\Types::orderBy('types')->get() as $type)
                        <option value="{{$type->id}}">{{$type->types}}</option>
                  @endforeach
                </select>
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
	                <th>Agent</th>
	                <th>Property Name</th>
					<th>Type</th>
					<th>Purpose</th>
	                <th class="text-center">Status</th> 
	                <th class="text-center width-100">Action</th>
	            </tr>
            </thead>

            <tbody>
            @foreach($propertieslist as $i => $property)
         	   <tr>
            	
				<td>{{ $property->id }}</td>
				<td>{{ getUserInfo($property->user_id)->name }}</td> 
                <td>{{ $property->property_name }}</td>
				<td>{{ getPropertyTypeName($property->property_type)->types }}</td>
				<td>{{ $property->property_purpose }}</td>
				<td class="text-center">
						@if($property->status==1)
							<span class="icon-circle bg-green">
								<i class="md md-check"></i>
							</span>
						@else
							<span class="icon-circle bg-orange">
								<i class="md md-close"></i>
							</span>
						@endif
            	</td>  
                <td class="text-center">
                <div class="btn-group">
								<button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									Actions <span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right" role="menu"> 
									<li><a href="{{ url('update-property/'.Crypt::encryptString($property->id)) }}" target="_blank"><i class="md md-edit"></i> Edit</a></li>
									
									 
									<li>
										@if($property->featured_property==0)                	
					                	<a href="{{ url('admin/properties/featuredproperty/'.Crypt::encryptString($property->id)) }}"><i class="md md-star"></i> Set as Featured</a>
					                	@else
					                	<a href="{{ url('admin/properties/featuredproperty/'.Crypt::encryptString($property->id)) }}"><i class="md md-check"></i> Unset from Featured</a>
					                	@endif
									</li>
									 
									
									<li>
										@if($property->status==1)                	
					                	<a href="{{ url('admin/properties/status/'.Crypt::encryptString($property->id)) }}"><i class="md md-close"></i> Unpublish</a>
					                	@else
					                	<a href="{{ url('admin/properties/status/'.Crypt::encryptString($property->id)) }}"><i class="md md-check"></i> Publish</a>
					                	@endif
									</li>
									<li><a href="{{ url('admin/properties/delete/'.Crypt::encryptString($property->id)) }}" onclick="return confirm('Are you sure? You will not be able to recover this.')"><i class="md md-delete"></i> Delete</a></li>
								</ul>
							</div> 
                
            </td>
                
            </tr>
           @endforeach
             
            </tbody>
            <tfoot>
		        <tr>
		            <td colspan="8" class="text-center">
		            	@include('admin.pagination', ['paginator' => $propertieslist])
		                 
		            </td>
		        </tr>
        	</tfoot>
        </table>
    </div>
    <div class="clearfix"></div>
</div>

</div>



@endsection