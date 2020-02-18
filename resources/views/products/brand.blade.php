@extends('master')

@section('content')
       <!-- Page Heading -->
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Brands</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
      </div>
     
<div class="row">      
  <div class="col-xl-5 col-lg-7">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Add New Brands</h6>
      
      </div>
      <!-- Card Body -->
      <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $msg)
                        <li>{{ $msg }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="/brand/add" enctype="multipart/form-data">
          @csrf
            <div class="form-group" >
              <label for="Input">Name</label>
              <input type="text" name="name" id="Input" class="form-control">
            </div>
            <div class="form-group">
              <label for="logo">Choose Logo</label>
              <input type="file" id="logo" name="img" class="form-control">

            </div>
         
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-xl-7 col-lg-7">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">All Brands</h6>
      
      </div>
      <!-- Card Body -->
      <div class="card-body">

       <table class="table table-hover">
         <thead>
           <th>No</th>
           <th>Logo</th>
           <th>Name</th>
           <th>Edit</th>
           <th>Delete</th>

         </thead>
         @forelse (\App\Brand::all() as $brand)
        <tr id="row_{{$brand->id}}">
           <td>{{$loop->iteration}}</td>
           <td><img style="width:50px;hight:50px" src="{{asset('storage/'.$brand->img)}}"/></td>
           <td>{{$brand->name}}</td>

            <td>

                 {{-- edit component --}}
                 @component('my_components.edit',["cat"=>$brand])
                 
                 @slot('url_edit')
                 /brand/edit
                 @endslot
                 @slot('hidden')
                     d-none
                 @endslot 
                 @slot('class')
                 @endslot 
                 @slot('img')
              {{asset('storage/'.$brand->img)}}
              @endslot
                @endcomponent
            </td>

           <td>
             {{-- <a href="/brand/delete/{{$brand->id}}"><i class="fas fa-trash-alt"></i></a> --}}
              {{-- delete component --}}
              {{-- @component('my_components.alert',["cat"=>$brand])
              are you sure that you want to delete {{$brand->name}} Category ? 
              @slot('icon')
              fas fa-trash-alt
              @endslot
              @slot('url_delete')
              /brand/delete/
              @endslot
              @slot('confirm')
              Delete Logo
              @endslot 
              @slot('class')
              @endslot 
              @slot('img')
              {{asset('storage/'.$brand->img)}}
              @endslot 
           @endcomponent --}}
           <a  id="delete_brand_btn{{$brand->id}}" onclick="del_barnd({{$brand->id}})" class="fas fa-trash text-danger"></a>
          </td>
           </tr>
         @empty
              <tr>
             <td colspan="3">No Brand</td>
              </tr>
         @endforelse     

       </table>


      </div>
    </div>




</div>


@endsection

@section('script')
<script>
  function del_barnd(brand_id)
  {
    $.ajax({
      type: "POST",
      url : "/brand/delete/" ,
      data: {"id" : brand_id ,"_token" :"{{csrf_token()}}"},
      success :function (rslt)
      {
        //console.log(rslt);
        $("#row_"+brand_id).fadeOut(2000);
      }
    });
  }

</script>
    
@endsection

