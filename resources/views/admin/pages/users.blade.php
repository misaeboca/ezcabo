@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
		
		<div class="pull-right">
			<a href="{{URL::to('admin/users/adduser')}}" class="btn btn-primary">Add User <i class="fa fa-plus"></i></a>
		</div>
		<h2>Users</h2>
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
         {!! Form::open(array('url' => 'admin/users','class'=>'form-inline filter','id'=>'search','role'=>'form','method'=>'get')) !!}	
            <span class="bold text-muted">Search</span>
            <div class="form-group">
                <input type="text" class="form-control" id="" name="keyword" placeholder="Search By Name, Email">
            </div>             
            <div class="form-group">
                <select name="type" id="basic" class="selectpicker show-tick form-control" data-live-search="false">
                   <option value="">User Type</option>
                   <option value="Agent">Agent</option>
                   <option value="User">User</option>
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
	                <th>Type</th>
	                <th>Image</th>
	                <th>Name</th>
	                <th>Email</th>
					<th>Phone</th> 
	                <th class="text-center width-100">Action</th>
	            </tr>
            </thead>

            <tbody>
            @foreach($allusers as $i => $users)
         	   <tr>
            	<td>{{ $users->usertype }}</td>
            	<td> @if($users->image_icon)
                                 
									<img src="{{ URL::asset('upload/members/'.$users->image_icon.'-s.jpg') }}" width="80" alt="person">
								@endif</td>
                <td>{{ $users->name }}</td>
                <td>{{ $users->email}}</td>
                <td>{{ $users->phone}}</td>
                <td class="text-center">
                <div class="btn-group">
								<button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									Actions <span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right" role="menu"> 
									<li><a href="{{ url('admin/users/adduser/'.Crypt::encryptString($users->id)) }}"><i class="md md-edit"></i> Edit Editor</a></li>
									<li><a href="{{ url('admin/users/delete/'.Crypt::encryptString($users->id)) }}" onclick="return confirm('Are you sure? You will not be able to recover this user and related properties data.')"><i class="md md-delete"></i> Delete</a></li>
								</ul>
							</div> 
                
            </td>
                
            </tr>
           @endforeach
             
            </tbody>
            <tfoot>
		        <tr>
		            <td colspan="8" class="text-center">
		            	@include('admin.pagination', ['paginator' => $allusers])
		                 
		            </td>
		        </tr>
        	</tfoot>
        </table>
    </div>
    <div class="clearfix"></div>
</div>

</div>



@endsection