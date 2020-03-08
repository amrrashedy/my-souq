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
              <h6 class="m-0 font-weight-bold text-primary">Add New Product | <a href="/products">Show All Products</a></h6>
             </div>
            <!-- Card Body -->
            <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Quntity</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Brand</th>
                                <th>Created At</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>                            
                          @forelse ($products as $product)
                          <tr>
                            <th>{{$num++}}</th>
                            <th>{{$product->name}}</th>
                            <th>{{$product->qty}}</th>
                            <th>{{$product->price}}</th>
                            <th>{{($product->category)?$product->category->name:""}}</th>
                            <th>{{($product->sub_category)?$product->sub_category->name :""}}</th>
                            <th>{{($product->brand)?$product->brand->name :"No Brand"}}</th>
                            <th>{{$product->created_at}}</th>
                            {{-- <th>{{$product->created_at->format("Y-d-m")}}</th> --}}
                          <th><a href="/products/image/add/{{$product->id}}" class="fa fa-plus-circle" title="Add Image to Product {{$product->name}}"><span class="badge badge-pill">{{$product->product_images->count()}}</span></a></th>
                        </tr>
                          @empty
                          <tr>
                            <td colspan="7">No Products</td>                           
                        </tr> 
                          @endforelse
                        </tbody>
                    </table>
            {{$products->links()}}
            </div>
          </div>
        </div>

        
      </div>
@endsection

