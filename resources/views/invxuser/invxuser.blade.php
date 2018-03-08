@extends('templates.default')

@section('title', 'Parts inside inventory')

  @section('content')

    <h3 class="title is-3">Parts for inventory named "{{$inventory_list_id->list_name}}"</h3>

@if(session()->has('message'))
  @component('components.alert-info')
    {{session()->get('message')}}
  @endcomponent
@endif

    <form>
      <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
  
  
      <table class="table is-striped is-hoverable is-narrow">
        <thead>
          <tr>
              <th>id</th>
              <th>part num</th>
              <th>color id</th>
              <th>quantity</th>
              <th>inventory</th>
              <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($parts_x_inv as $part_x_inv)
          <tr>
            <td>{{$part_x_inv->id}}</td>
            <td>{{$part_x_inv->part_id}}</td>
            <td>{{$part_x_inv->color_id}}</td>
            <td>{{$part_x_inv->quantity}}</td>
            <td>{{$part_x_inv->inventory_list_id}}</td>
            <td>
              <a href="/invxuser/{{$part_x_inv->id}}" class="button is-danger">DELETE</a>
            </td>
          </tr>
  
        @endforeach
        </tbody>
      </table>

    </form>
  @endsection


{{--@include('components.card')--}}


@section('footer')
  @parent
    <script>
    $('document').ready(function(){
      $('#alert_box').fadeOut(3500);

      $('td').on('click', 'a[class="button is-danger"]', function(ele) {
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
