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
