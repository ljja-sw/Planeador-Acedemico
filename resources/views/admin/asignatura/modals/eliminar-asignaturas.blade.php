<div class="modal fade" id="modal-eliminar-asignaturas" tabindex="-1" role="dialog" aria-hidden="true">
  <form role="document" action="{{route('asignaturas.destroy', $asigna)}}" class="modal-dialog modal-dialog-centered" method="POST" autocomplete="off">
    @csrf
      <div class="modal-content">
        <div class="modal-headery text-center">
          <i class="fa fa-exclamation-triangle fa-3x py-2"></i>
            <h4 class="font-weight-bold h4-responsive">
              Eliminar Asignatura
            </h4>
        </div>
          <div class="modal-body mx-3">
           <div class="md-form md-outline">
              <h4 class="h4-responsive font-weight-bold">
               Esta seguro que desea eliminar a:
                {{$asigna->nombre}} 
              </h4>
            </div>
          <button class="btn btn-elegant">Si</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Cancelar" aria-hidden="true">No</button>
        </div>
      </div>      
  </form>
</div>