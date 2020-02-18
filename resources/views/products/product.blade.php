@extends('master')

@section('content')
       <!-- Page Heading -->
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
      </div>

      <!-- Content Row -->

      <div class="row">
       
        <div class="col-md-12">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Add New Product</h6>
            
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
          
              <form method="post" action="/products/add">
                @csrf
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                  </div>
                  
                  <div class="form-group" >
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" class="form-control">
                  </div>

                  <div class="form-group" >
                    <label for="qty">Quantity</label>
                    <input type="text" name="qty" id="qty" class="form-control">
                  </div>

                                 
                  <div class="form-group" >
                    <label for="qty">Status</label>
                    <select name="status" id="status" class="form-control">
                      <option>Available</option>
                      <option>Not Available</option>
                      {{-- <option>Not Available In Your Country</option> --}}
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Brand</label>
                    <select  name="brand_id" class="form-control form-control">
                      @forelse (\App\brand::all() as $row)
                    <option class="form-control form-control"    value="{{$row->id}}">{{$row->name}}</option>  
                      @empty
                      <option>No Brand</option>
                      @endforelse                     
                    </select>
                  </div>
                  <div class="form-group">
                    <label>category</label>
                    <select  name="category_id" id="category_id" class="form-control form-control">
                      <option value="">Choose Category</option>
                      @forelse (\App\category::all() as $row)
                      <option class="form-control form-control"    value="{{$row->id}}">{{$row->name}}</option>  
                      @empty
                      <option>No Category</option>
                      @endforelse                     
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Sub Catgeory</label>
                    <select name="sub_category_id"  id="sub_category_id" class="form-control form-control">                      
                      <option value="">Choose Catgory First</option>                                       
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description"></textarea>
                  </div>
                </div>
                </div>
                <button type="submit" class="btn btn-primary" >S A V E</button>
                  {{-- <button type="button" class="btn btn-primary" onclick="get_sub()">Submit</button> --}}
              </form>
            </div>
          </div>
        </div>

        
      </div>
@endsection

@section('script')
    <script>
      //;var x = {id:10 , name :"ahmed"};
      // function test()
      // {
      //   alert("Hello");
      // }
      // $("#name").blur(test);
      // $("#name").blur(function(){

      //   alert("Hello " + $("#name").val());
      // });
      

      $("#category_id").change(function (){
       // console.log($(this).val());
        $.ajax({
          type : "POST" ,
          url  : "/category/sub_cats",
          data : {"category_id" : $(this).val() ,"_token" :"{{csrf_token()}}"},
          success : function (sub_cats_rslt){
            //console.log(sub_cats_rslt);
            $("#sub_category_id").empty();

            for(sub_cat of sub_cats_rslt)
            {
              //console.log(sub_cat);              
              $("#sub_category_id").append("<option value='"+ sub_cat.id+"'>"+sub_cat.name+"</option>");
            }
          }
          
        });

      });
    </script>
    
@endsection