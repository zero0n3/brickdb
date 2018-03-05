@extends('templates.default')

@section('title', 'Create Inventory')

  @section('content')

    <h2>CREATE NEW Inventory</h2>

    <form action="{{route('inventory.save')}}" method="POST">
      {{csrf_field()}}
        
      <div class="row">
          <div class="row">
            <div class="input-field col s6">
              <input name="list_name" type="text" class="validate" value="">
              <label for="name">Name</label>
            </div>
          </div>

      </div>

      <button class="btn waves-effect waves-light" type="submit" name="action">Submit
        <i class="material-icons right">send</i>
      </button>

    </form>


@endsection
