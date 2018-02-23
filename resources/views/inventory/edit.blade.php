@extends('templates.default')

@section('title', 'Edit Inventory')

  @section('content')

    <h2>Edit Inventory</h2>

    <form action="/inventory/{{$inventory_list->id}}" method="POST">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="PATCH">
        
      <div class="row">
          <div class="row">
            <div class="input-field col s6">
              <input id="inventory_name" type="text" class="validate" value="{{$inventory_list->list_name}}">
              <label for="name">Name</label>
            </div>
          </div>

      </div>

      <button class="btn waves-effect waves-light" type="submit" name="action">Submit
        <i class="material-icons right">send</i>
      </button>

    </form>


@endsection
