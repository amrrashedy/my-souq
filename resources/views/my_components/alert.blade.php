<!-- Button trigger modal -->
<a  class="{{$class ?? 'float-right ml-1'}}" data-toggle="modal" 
data-target="#exampleModalLong{{$cat->id}}{{$a ?? ''}}">
<i class="{{$icon ?? 'fas fa-trash-alt'}}"></i></a>

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong{{$cat->id}}{{$a ?? ''}}" tabindex="-1" 
    role="dialog" aria-labelledby="exampleModalLongTitle{{$cat->id}}{{$a ?? ''}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle{{$cat->id}}{{$a ?? ''}}">Confirm {{$confirm ?? ""}}</h5>
          {{-- brand logo image --}}
        <span><img class="ml-3" style="width:40px;hight:40px" src="{{$img ?? ''}}" /></span>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         {{$slot}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <a type="button" class="btn btn-danger" href="{{$url_delete}}{{$cat->id}}" >Yes</a>
        </div>
      </div>
    </div>
  </div>