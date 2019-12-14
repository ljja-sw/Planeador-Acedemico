<div class="modal fade" id="modal_eliminar_programas" tabindex="-1" role="dialog" aria-hidden="true">
  <form role="document" action="{{route("programa.destroy",$programa)}}" class="modal-dialog modal-dialog-centered" method="POST" autocomplete="off">
    @csrf
    <div class="modal-content">
      <div class="modal-headery text-center">
        <span class="fa-stack fa-2x">
          <i class="fas fa-graduation-cap fa-stack-2x"></i>
          <i class="fas fa-trash fa-stack-1x fa-inverse"></i>
        </span>
        <h4 class="font-weight-bold h4-responsive">
          Eliminar Programa
        </h4>
      </div>
      <div class="modal-body mx-auto text-center">
        <p class="m-0">Deseas eliminar</p>
        <h4 class="h4-responsive font-weight-bold">
          {{$programa->nombre}} 
        </h4>
        <button class="btn btn-danger"><i class="fa fa-trash"></i> Si</button>
        <button class="btn btn-outline-elegant" type="button" data-dismiss="modal" aria-label="Cancelar" aria-hidden="true"><i class="fa fa-times"></i> No</button>
      </div>
    </div>      
  </form>
</div>