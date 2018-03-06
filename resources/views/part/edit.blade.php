@extends('templates.default')

@section('title', 'Edit Part')

  @section('content')

    <h3 class="title is-3">Edit {{$part->part_num}}</h3>

    <form action="/partlist/{{$part->part_num}}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="PATCH">
      
      <!-- recupero il nome file in un campo hidden perchè se invio un nuovo file deve sovrascrivere il precedente con lo stesso nome -->
      <input type="hidden" name="_filename" value="{{basename(asset($part->path))}}">

      
      <!-- codice PARTE -->
      <div class="columns is-mobile">
        <div class="column is-two-fifths">
          <div class="field">
            <label class="label">Codice</label>
            <div class="control">
              <input name="part_num" class="input is-danger" type="text" value="{{$part->part_num}}" readonly>
            </div>
            <p class="help">Non modificabile</p>
          </div>
        </div>
      </div>
      
      <!-- descrizione PARTE -->
      <div class="columns is-mobile">
        <div class="column is-two-fifths">
          <div class="field">
            <label class="label">Nome</label>
            <div class="control">
              <input name="name" class="input is-success" type="text" value="{{$part->name}}">
            </div>
          </div>
        </div>
      </div>

      <!-- categoria PARTE -->
      <div class="columns is-mobile">
        <div class="column is-two-fifths">
          <div class="field">
            <label class="label">Categoria</label>
            <div class="control">
              <input name="part_cat_id" class="input is-success" type="text" value="{{$part->part_cat_id}}">
            </div>
          </div>
        </div>
      </div>      

      <!-- FOTO DA DB -->
      @if($part->part_img_url)
      <div class="columns is-mobile">
        <div class="column is-two-fifths">
          <figure class="image is-128x128">
            <img src="{{asset($part->path)}}" alt="{{$part->part_num}}">
          </figure>
        </div>
      </div> 
      @endif

      <!-- FOTO CARICATA SPOT DA INSERIRE NEL DB -->
      <div class="columns is-mobile">
        <div class="column is-two-fifths">
          <div class="file is-info is-small">
            <label class="file-label">
              <input class="file-input" type="file" name="part_img">
              <span class="file-cta">
                <span class="file-icon">
                  <i class="fas fa-upload"></i>
                </span>
                <span class="file-label">
                  Choose a file…
                </span>
              </span>
            </label>
          </div>
        </div>
      </div> 

      <!-- SUBMIT -->
      <div class="columns is-mobile">
        <div class="column is-two-fifths">      
          <div class="control">
            <button class="button is-primary" type="submit" name="action">Submit</button>
          </div>
        </div>
      </div>
      
    </form>


@endsection
