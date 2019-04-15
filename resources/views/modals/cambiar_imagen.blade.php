<div class="modal fade" id="modal_cambiar_avatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<form class="modal-dialog" enctype="multipart/form-data" role="document" action="{{ url('/cambiar-avatar') }}" autocomplete="off" method="POST">
  @csrf
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">Cambiar Imagen de Perfil</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-auto">
        <div class="px-4 my-5 flex-center">
            <img src="{{auth()->user()->getAvatar()}}" alt="" id="imagen_avatar" class="rounded-circle z-depth-1 img-avatar-" style="width:250px;height:250px;object-fit:cover">
        </div>
        <input type="file" name="avatar" accept="image/*" id="input_cambiar_avatar" required>
    </div>
    <div class="modal-footer d-flex justify-content-center">
      <button class="btn btn-elegant">
        <i class="fa fa-save"></i>
        Cambiar
      </button>
    </div>
  </div>
</form>
</div>
@push('scripts')
<script>
  $("#input_cambiar_avatar").change(function(){
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#imagen_avatar')
      .attr('src', e.target.result);
    };

    reader.readAsDataURL(this.files[0]);
  })
</script>
@endpush
