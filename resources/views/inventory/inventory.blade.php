@extends('templates.default')

@section('title', 'Inventory Lists')

  @section('content')

    <h3 class="title is-3">Inventory list</h3>

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
              <th>Id</th>
              <th>List name</th>
              <th>Image</th>
              <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($inventory_lists as $inventory_list)
          <tr>
            <td>{{$inventory_list->id}}</td>
            <td>{{$inventory_list->list_name}}</td>
            @if($inventory_list->inv_thumb)
              <td><figure class="image is-48x48"><img src="{{asset($inventory_list->path)}}" alt="{{$inventory_list->list_name}}"></figure></td>
            @else
              <td></td>
            @endif
  
            <td>
                <a href="/inventory/{{$inventory_list->id}}/edit" class="button is-info">EDIT</a>     
                <a href="/inventory/{{$inventory_list->id}}" class="button is-danger">DELETE</a>
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
