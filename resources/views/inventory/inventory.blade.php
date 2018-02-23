@extends('templates.default')

@section('title', 'Inventory Lists')

  @section('content')

    <h2>Inventory Lists</h2>
    <form>
    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">


    <ul class="collection">
      @foreach ($inventory_lists as $inventory_list)

          <li class="collection-item">({{$inventory_list->id}}) {{$inventory_list->list_name}}
            <div class="right-align">      
              <a href="/inventory/{{$inventory_list->id}}" class="btn waves-effect waves-light">DELETE</a>
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
      $('ul').on('click', 'a[class="btn waves-effect waves-light"]', function(ele) {
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
