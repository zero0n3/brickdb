@extends('templates.default')

@section('title', 'Inventory Lists')

  @section('content')

    <h2>Inventory Lists</h2>

    @foreach ($inventory_lists as $inventory_list)

        <li class="list-group-item justify-content-between">({{$inventory_list->id}}) {{$inventory_list->list_name}}

          <div>
            <a href="/inventory/{{$inventory_list->id}}/delete" class="btn btn-danger">DELETE</a>
          </div>
        </li>

    @endforeach

  @endsection


{{--@include('components.card')--}}


@section('footer')
  @parent
  <script>
    //alert('blog')
  </script>
@endsection
