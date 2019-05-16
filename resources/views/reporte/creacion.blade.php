@extends('layouts.app')


@section('content')

<div class="container-fluid">
	<div class="col-md-8 mx-auto">
		<div class="card card-body text-center">
		    <i class="fa fa-newspaper fa-3x py-2"></i>
		    <h4 class="font-weight-bold h4-responsive">
		        realizar reporte 
		    </h4>
		</div>		
	</div>	
	<form action="" method="">
		<div class="row">
			<div class="col-md-8 mx-auto">
				<div class="card card-danger">
					<div class="card-header with-border"></div>
					<div class="card-body">
						<div class="form-group">
    						<label>Programa</label>
    						<input name="" value="" type="text" class="form-control" placeholder="Ingrese aqui el titulo de la publicacion" readonly="readonly">
    					</div>


    					<div class="form-group card-body">
                			<div class="mb-3">
	      						<label>Descripcion del reporte</label>
	      						<textarea rows="10" name="descripcion" id="editor" class="form-control" placeholder="Ingrese el contenido completo del reporte"></textarea>
                			</div>
    					</div>
						
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card card-danger">
					<div class="card-header with-border"></div>
					<div class="card-body">
						<div class="form-group">
    						<label>Asignatura</label>
    						<input name="" value="" type="text" class="form-control" placeholder="Ingrese aqui el titulo de la publicacion" readonly="readonly">
    					</div>

    					<div class="form-group">
					        <label>Temas</label>
					        <select class=" form-control select2" name="tema_planedor">
					        <option value=""></option>
					        </select>  
					    </div>

					    <div class="form-group">
					        <label>Semana</label>
					        <select class=" form-control select2" name="">
					        <option value=""></option>
					        </select>  
					    </div>						
					</div>					
				</div>				
			</div>			
		</div>	
	</form>	
</div>
@push("scripts-rep")
<script src="https://cdn.ckeditor.com/ckeditor5/12.1.0/classic/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      })

    // bootstrap WYSIHTML5 - text editor

    $('.textarea').wysihtml5({
      toolbar: { fa: true }
    })
  })
</script>
@endpush 
@endsection