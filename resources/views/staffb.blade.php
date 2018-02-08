@extends('templates.layout')

@section('title', $title)


@section('content')
	<h1>
	{{$title}} blade
	</h1>


	@if($staff)
	  <ul>
		  @foreach($staff as $person)
		    <li>{{$loop->iteration}} {{$person['name']}}   {{$person['lastname']}} </li>
		  @endforeach
	  </ul>
	 @else
	 <p>No stuff</p>

	@endif

<h3>secondo metodo di ciclo</h3>
	@forelse ($staff as $person)
	  <li>{{$person['name']}}   {{$person['lastname']}} </li>
	@empty
	  <li>no staff</li>
	@endforelse

@endsection

@section('footer')
	@parent
	<script>
		//alert('footer');
	</script>
	@stop