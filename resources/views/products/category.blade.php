@extends('master')

@section('content')
       <!-- Page Heading -->
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categrories</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
      </div>

      <!-- Content Row -->

<div class="row">
       


        <div class="col-xl-6 col-lg-7">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Add New Category</h6>
            
            </div>
            <!-- Card Body -->
            <div class="card-body">
              
              @if (session()->has('cat'))

              <div class="alert alert-success">
                {{session()->get('cat')->name}} - Save Successfully
              </div> 
             @endif

              <form method="post" action="/category/add" class="user">
                @csrf
                <div class="form-group">
                  <input name="name" type="text" class="form-control form-control-user mt-3"  placeholder="Enter Cat Name..."
                  @if (session()->has('cat'))
                  value='{{session()->get('cat')->name}}'
                  @else value='{{ old('name')}}'
                  @endif>
                  @error("name")
                  <span style="color:red">{{$message}}  
                    {{-- characters you entered {{old('name')}} --}}
                  </span>
                  @enderror
                </div>
              
              


                <button type="submit" class="btn btn-primary btn-user btn-block mt-5">
                  Save
                </button>
                
              </form>


            </div>
          </div>
        </div>






        <div class="col-xl-6 col-lg-7">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Add SubCategory</h6>
            
            </div>
            <!-- Card Body -->
            <div class="card-body">
              

 
              @if (session()->has('sub_cat'))

              <div class="alert alert-success">
                {{session()->get('sub_cat')->name}} - Save Successfully
              </div> 
             @endif
             
             <form class="user" method="post" action="/sub_category/add">
              @csrf
                <div class="form-group">
                  <input type="text" name="name" class="form-control form-control-user"  placeholder="Enter Name..."\
                  @if (session()->has('sub_cat'))
                  value='{{session()->get('sub_cat')->name}}'
                  @endif>
                  @error('name')
                  {{$message}}
                  @enderror
                </div>
              

                <div class="form-group">

                  <select type="text" name="category" class="form-control form-control">
                    @forelse (\App\category::all() as $row)
                  <option class="form-control form-control" 
                  value="{{$row->id}}"
                  @if (session()->has('sub_cat') && session()->get('sub_cat')->category_id ==$row->id )
                      selected
                  @endif
                  >{{$row->name}}</option>

                    @empty
                    <option>No Category</option>
                    @endforelse
                    {{-- <option value="3">Test</option> --}}
                  </select>
                  @error('category')
                  {{$message}}
                  @enderror
                </div>
                
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Save
                </button>
                
              </form>


            </div>
          </div>
        </div>



        
        <div class="col-xl-12 col-lg-7">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">All Category</h6>
            
            </div>
            <!-- Card Body -->
            <div class="card-body">
              @if (session()->has("qry_error_message"))
                    Can't Delete Category
              @endif
           
           {{-- get all category--}}
             <div class="row">
             @forelse (\App\category::all() as $cat)               

              <div class="card shadow mb-4 ml-2">
                <div class="card-header text-bold">
                  {{$cat->name}}

                 
                 {{-- delete component --}}
                 @component('my_components.alert',["cat"=>$cat])
                    are you sure that you want to delete {{$cat->name}} Category ? 
                    @slot('icon')
                    fas fa-trash-alt
                    @endslot
                    @slot('url_delete')
                    /category/delete/
                    @endslot
                    @slot('confirm')
                    Delete Category
                    @endslot 
                 @endcomponent


                  {{-- edit component --}}
                @component('my_components.edit',["cat"=>$cat])
                 
                 @slot('url_edit')
                 /category/edit
                 @endslot
                 @slot('hidden')
                     d-none
                 @endslot 
                @endcomponent

                
                  </div>


                  {{-- sub category view --}}
                <div class="card-body">
                  {{-- to get one to many --}}
                    @forelse ($cat->sub_categories_one_to_many as $sub_cat)
                    {{$sub_cat->name}}

                  
                    {{-- delete component --}}
                    @component('my_components.alert',["cat"=>$sub_cat])
                    are you sure that you want to delete {{$sub_cat->name}} Sub Category? 
                    @slot('icon')
                    fas fa-calendar-times                        
                    @endslot
                    @slot('url_delete')
                    /sub_category/delete/
                    @endslot
                    @slot('confirm')
                    Delete SubCategory
                    @endslot
                    @slot('a')
                    a
                    @endslot
                 @endcomponent

                 {{-- edit component --}}
                 @component('my_components.edit',["cat"=>$sub_cat])
                 @slot('url_edit')
                 /sub_category/edit
                 @endslot
                 @slot('b')
                    b
                    @endslot
                 @endcomponent
                    <hr>
                    @empty
                        
                 @endforelse
                     



                    
                </div>
              </div>      
                  


             

             

            
             @empty
             No category yet 
             @endforelse 

            
           </div>





            </div>
          </div>
        </div>

      </div>
@endsection