<!-- Button trigger modal -->
<a  class="{{$class ?? 'float-right ml-5'}}" data-toggle="modal" data-target="#exampleModalCenter{{$cat->id}}{{$b ?? ''}}">
    <i class="fas fa-edit"></i></a>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter{{$cat->id}}{{$b ?? ''}}" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle{{$cat->id}}{{$b ?? ''}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle{{$cat->id}}{{$b ?? ''}}">Edit {{$cat->name}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <form  method="post" action="{{$url_edit}}" enctype="multipart/form-data">

            @csrf
        <div class="modal-body">
        
            <input type="hidden" value="{{$cat->id}}" name="edit_id">

           
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Name:</label>
                <input type="text" value="{{$cat->name}}" name="edit_name"class="form-control" id="recipient-name">
                </div>
                <div class="form-group {{$hidden ?? ''}}">
                    <select type="text" name="edit_category" class="form-control form-control">
                        @forelse (\App\category::all() as $row)
                      <option class="form-control" 
                      value="{{$row->id}}"
                      @if ($cat->category_id ==$row->id )
                          selected
                      @endif
                      >{{$row->name}}</option>
    
                        @empty
                        <option>No Category</option>
                        @endforelse
                      </select>
                  </div>
                  <div class="form-group {{$class ?? 'd-none'}}">
                    <label for="logo">Current Logo

                      <span><img class="ml-3" style="width:40px;hight:40px" src="{{$img ?? ''}}" /></span>

                    </label>
                    <input type="file" id="logo" name="edit_img" class="form-control">
      
                  </div>
             



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">
            Save changes
          </button>
        </div>
    </form>
      </div>
    </div>
  </div>