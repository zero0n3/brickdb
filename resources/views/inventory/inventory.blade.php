@extends('templates.default')

@section('title', 'Inventory Lists')

  @section('content')

    <h2>Inventory Lists</h2>

@if(session()->has('message'))
  @component('components.alert-info')
    {{session()->get('message')}}
  @endcomponent
@endif

    <form>
    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">



    <ul class="collection">
      @foreach ($inventory_lists as $inventory_list)

          <li class="collection-item">({{$inventory_list->id}}) {{$inventory_list->list_name}}

            <div class="right-align"> 
              @if($inventory_list->inv_thumb)
                <img  class="circle responsive-img" width="50" src="{{asset($inventory_list->path)}}" alt="{{$inventory_list->list_name}}">
              @endif
              <a href="/inventory/{{$inventory_list->id}}/edit" class="btn waves-effect waves-light blue">EDIT</a>     
              <a href="/inventory/{{$inventory_list->id}}" class="btn waves-effect waves-light red">DELETE</a>
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
      $('#alert_box').fadeOut(3500);
      $('ul').on('click', 'a[class="btn waves-effect waves-light red"]', function(ele) {
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
