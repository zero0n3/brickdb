@extends('templates.default')

@section('title', 'Edit Inventory')

  @section('content')

    <h3 class="title is-3">Edit Inventory</h3>

    <form action="/inventory/{{$inventory_list->id}}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="PATCH">
      
      <!-- NOME ALBUM -->  
      <div class="columns is-mobile">
        <div class="column is-two-fifths">
          <div class="field">
            <label class="label">Nome</label>
            <div class="control">
              <input name="list_name" class="input is-success" type="text" value="{{$inventory_list->list_name}}">
            </div>
          </div>
        </div>
      </div>      

      <!-- FOTO DA DB -->
      @if($inventory_list->inv_thumb)
      <div class="columns is-mobile">
        <div class="column is-two-fifths">
          <figure class="image is-128x128">
            <img src="{{asset($inventory_list->path)}}" alt="{{$inventory_list->list_name}}">
          </figure>
        </div>
      </div> 
      @endif

      <!-- FOTO CARICATA SPOT DA INSERIRE NEL DB -->
      <div class="columns is-mobile">
        <div class="column is-two-fifths">
          <div class="file is-info is-small">
            <label class="file-label">
              <input class="file-input" type="file" name="inv_thumb">
              <span class="file-cta">
                <span class="file-icon">
                  <i class="fas fa-upload"></i>
                </span>
                <span class="file-label">
                  Choose a file…
                </span>
              </span>
            </label>
          </div>
        </div>
      </div>       

      <!-- SUBMIT -->
      <div class="columns is-mobile">
        <div class="column is-two-fifths">      
          <div class="control">
            <button class="button is-primary" type="submit" name="action">Submit</button>
          </div>
        </div>
      </div>

    </form>

@endsection
