<div class="modal fade" id="modal-editar-reportes" tabindex="-1" role="dialog" aria-hidden="true">
	<form role="document" action="{{route('reporte.update',$reporte)}}" class="modal-dialog" method="POST" autocomplete="off">
		@csrf
		<div class="modal-content">
	        <div class="modal-headery text-center">
	          <i class="fa fa-book fa-3x py-2"></i>
	            <h4 class="font-weight-bold h4-responsive">
	              Editar Asignaturas
	            </h4>
	        </div>

	        <div class="modal-body mx-3"> 

	            <div class="form-group">
                  <label>Semana</label>
                  <select name="semana_tema" class=" form-control" id="semana_select">
                    <option value="{{ $reporte->semana_tema }}">Seleciones una opcion</option>

                  </select>
                </div>


	            <div class="form-group">
	              <label>Temas</label>
	              <select name="tema_planeador" class=" form-control" id="temas_planeador_select"  required>
	                <option value="{{ $reporte->tema_planeador }}">Seleciones una opcion</option>
  
	              </select>  
	            </div>   

              <div class="form-group">
                <label>Tipo de Clase</label>
                <select class=" form-control" name="tipo_clase">
                    <option value="{{ $reporte->semana }}">Seleciones una opción</option>
   
                </select>            
              </div>

		        <div id="pruden">
		          <div class="form-group card-body" id='acta' style=" display:none";>
		            <div class="mb-3">
		              <label>Motivo</label>
		              <textarea rows="5"  name="justificacion" id="#" class="form-control medium-textarea" value="{{$reporte->justificacion}}" placeholder="Ingrese el contenido completo del reporte"></textarea>
		            </div>
		          </div>
		        </div>

             

        	
	        </div>

		</div>
	</form>
</div>
<script type="text/javascript">
  $(function () {

    $('#semana_select').select2({
    });


  })


$('#temas_planeador_select').select2({
 });

</script>