@extends('templates.default')

@section('title', 'Parts')

  @section('content')

    <h2>Parts</h2>

@if(session()->has('message'))
  @component('components.alert-info')
    {{session()->get('message')}}
  @endcomponent
@endif

    <form>
    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">


    <table class="bordered highlight responsive-table">
      <thead>
        <tr>
            <th>Part Num</th>
            <th>Name</th>
            <th>Cat.</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($parts as $part)
        <tr>
          <td>{{$part->part_num}}</td>
          <td>{{$part->name}}</td>
          <td>{{$part->part_cat_id}}</td>
          @if($part->part_img_url)
            <td><img  class="responsive-img" width="50" src="{{asset($part->path)}}" alt="{{$part->name}}"></td>
          @else
            <td></td>
          @endif

          <td>
            <a href="/partlist/{{$part->part_num}}/edit" class="btn waves-effect waves-light blue">EDIT</a>
            <!--<a href="/partlist/{{$part->part_num}}" class="btn waves-effect waves-light red">DELETE</a>-->
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
