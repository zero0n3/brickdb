@extends('templates.layout')

@section('title', $title)


@section('content')
	<h1>
	{{$title}} blade
	</h1>


	@if($staff)
	  <ul>
		  @foreach($staff as $person)
		    <li>{{$person['name']}}   {{$person['lastname']}} </li>
		  @endforeach
	  </ul>

	@endif
@endsection

@section('footer')
	@parent
	<script>
		alert('footer');
	</script>
	@stop