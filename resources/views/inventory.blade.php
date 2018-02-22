@extends('templates.default')

@section('title', 'Inventory Lists')

  @section('content')

    <h2>Inventory Lists</h2>
    
    <ul class="collection">
      @foreach ($inventory_lists as $inventory_list)

          <li class="collection-item">({{$inventory_list->id}}) {{$inventory_list->list_name}}
            
            <div class="right-align">
              <a href="/inventory/{{$inventory_list->id}}/delete" class="btn danger">DELETE</a>
            </div>
          </li>

      @endforeach
    </ul>

  @endsection


{{--@include('components.card')--}}


@section('footer')
  @parent
  <script>


   $('document').ready(function(){
      $('div.alert').fadeOut(1500);
      $('ul').on('click', 'a.btn danger', function(ele) {
      //$('#delete').click(function(ele) {
        ele.preventDefault();
        /* Act on the event */
        //console.log(ele);
        var urlInventory = $(this).attr('href');

        //console.log(myvar);
        //var li = ele.target.parentNode;
        var li = ele.target.parentNode.parentNode;
//console.log(li);
        $.ajax(
          urlInventory,
          {
            method: 'DELETE',
            data: {
              '_token': $('#_token').val()
            },
            complete : function(resp){

              if (resp.responseText == 1){
                
                li.parentNode.removeChild(li);
              
              } else {
                
                alert('Problem contacting server');
              
              }
            }
          })

      });
    });

  </script>
@endsection
