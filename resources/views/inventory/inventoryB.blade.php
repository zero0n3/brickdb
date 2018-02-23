@extends('templates.defaultB')

@section('title', 'BBBBBBBBBBB')

  @section('content')

    <h2>BBBBBBBBBBB</h2>
    <form>
      <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">


      <ul class="list-group">
        @foreach ($inventory_lists as $inventory_list)

            <li class="list-group-item d-flex justify-content-between">({{$inventory_list->id}}) {{$inventory_list->list_name}}
              <div>
                <a href="/inventory/{{$inventory_list->id}}/edit" class="btn btn-primary">EDIT</a>
                <a href="/inventory/{{$inventory_list->id}}" class="btn btn-danger">DELETE</a>
              </div>
            </li>

        @endforeach
      </ul>
    </form>
  @endsection


{{--@include('components.card')--}}


@section('footer')
  @parent
    <script>
    $('document').ready(function(){
      $('div.alert').fadeOut(1500);
      $('ul').on('click', 'a.btn-danger', function(ele) {
        ele.preventDefault();

        var urlInventory = $(this).attr('href');

        var li = ele.target.parentNode.parentNode;
        
        $.ajax(urlInventory, 
        {
          method: 'DELETE',
          data: {
            '_token': $('#_token').val()
          },
          complete : function(resp){
              if (resp.responseText == 1){
                $(li).remove();
              } else {
                alert('Problem contacting server');
              }
          }
        })

      });
    });


    </script>

@endsection
