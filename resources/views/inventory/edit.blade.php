@extends('templates.default')

@section('title', 'Edit Inventory')

  @section('content')

    <h3 class="title is-3">Edit Inventory</h3>

    <form action="/inventory/{{$inventory_list->id}}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="PATCH">
      
      <!-- NOME INVENTORY -->  
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

      @include('inventory.partials.fileupload') 

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
