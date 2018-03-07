<!-- FOTO DA DB -->
@if($inventory_list->inv_thumb)
<div class="columns is-mobile">
<div class="column is-two-fifths">
  <figure class="image is-128x128">
    <img src="{{asset($inventory_list->path)}}" alt="{{$inventory_list->list_name}}">
  </figure>
</div>
</div> 
@endif

<!-- FOTO CARICATA SPOT DA INSERIRE NEL DB -->
<div class="columns is-mobile">
<div class="column is-two-fifths">
  <div class="file is-info is-small">
    <label class="file-label">
      <input class="file-input" type="file" name="inv_thumb">
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