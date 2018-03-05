@extends('templates.default')

@section('title', 'Edit Part')

  @section('content')

    <h2>Edit Part</h2>

    <form action="/partlist/{{$part->part_num}}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="PATCH">
      
      <!-- recupero il nome file in un campo hidden perchè se invio un nuovo file deve sovrascrivere il precedente con lo stesso nome -->
      <input type="hidden" name="_filename" value="{{basename(asset($part->path))}}">

      
      <!-- codice PARTE -->  
      <div class="row">
          <div class="row">
            <div class="input-field col s6">
              <input disabled name="part_num" type="text" class="validate" value="{{$part->part_num}}">
              <label for="codice">Codice (non modificabile)</label>
            </div>
          </div>
      </div>

      <!-- descrizione PARTE -->  
      <div class="row">
          <div class="row">
            <div class="input-field col s6">
              <input name="name" type="text" class="validate" value="{{$part->name}}">
              <label for="name">Nome</label>
            </div>
          </div>
      </div>
      
      <!-- categoria PARTE -->  
      <div class="row">
          <div class="row">
            <div class="input-field col s6">
              <input name="part_cat_id" type="text" class="validate" value="{{$part->part_cat_id}}">
              <label for="part_cat_id">Categoria</label>
            </div>
          </div>
      </div>

      <!-- FOTO DA DB -->
      @if($part->part_img_url)
        <div class="row">
            <div class="row">
              <div class="input-field col s6">
                <img src="{{asset($part->path)}}" alt="{{$part->part_num}}">
              </div>
            </div>
        </div>
      @endif

      <!-- FOTO CARICATA SPOT DA INSERIRE NEL DB -->
      <div class="file-field input-field">
        <div class="btn">
          <span>New part image</span>
          <input type="file" name="part_img">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text">
        </div>
      </div> 

      <button class="btn waves-effect waves-light" type="submit" name="action">Submit
        <i class="material-icons right">send</i>
      </button>

    </form>


@endsection
