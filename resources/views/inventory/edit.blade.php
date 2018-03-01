@extends('templates.default')

@section('title', 'Edit Inventory')

  @section('content')

    <h2>Edit Inventory</h2>

    <form action="/inventory/{{$inventory_list->id}}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="PATCH">
      
      <!-- NOME ALBUM -->  
      <div class="row">
          <div class="row">
            <div class="input-field col s6">
              <input name="list_name" type="text" class="validate" value="{{$inventory_list->list_name}}">
              <label for="name">Name</label>
            </div>
          </div>
      </div>

      <!-- FOTO CARICATA SPOT DA INSERIRE NEL DB -->
      <div class="file-field input-field">
        <div class="btn">
          <span>Thumbnail</span>
          <input type="file" name="inv_thumb">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text">
        </div>
      </div>    

      <!-- FOTO DA DB -->
      @if($inventory_list->inv_thumb)
        <div class="row">
            <div class="row">
              <div class="input-field col s6">
                <img src="{{$inventory_list->inv_thumb}}" alt="{{$inventory_list->list_name}}">
              </div>
            </div>
        </div>
      @endif
      <button class="btn waves-effect waves-light" type="submit" name="action">Submit
        <i class="material-icons right">send</i>
      </button>

    </form>


@endsection
