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
          
              <form method="post" action="/product/add">
                @csrf
                <div class="col-md-5">
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
                <div class="col-md-5">
                  <div class="form-group">
                    <label>category</label>
                    <select type="text" name="category" class="form-control form-control">
                      @forelse (\App\category::all() as $row)
                    <option class="form-control form-control"    value="{{$row->id}}">{{$row->name}}</option>  
                      @empty
                      <option>No Category</option>
                      @endforelse                     
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Brand</label>
                    <select type="text" name="category" class="form-control form-control">
                      @forelse (\App\brand::all() as $row)
                    <option class="form-control form-control"    value="{{$row->id}}">{{$row->name}}</option>  
                      @empty
                      <option>No Brand</option>
                      @endforelse                     
                    </select>
                  </div>
                </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>

        
      </div>
@endsection