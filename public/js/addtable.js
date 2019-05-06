    
    
    $(document).ready(function(){
        $('#addtema').click(function(){
            agregar();
        });
    });
    var contador = 0;
    function(){
        let semana = document.getElementById("semana").value;
        let fecha = document.getElementById("fecha").value;
        let tema = document.getElementById("tema").value;
        let metodologia = document.getElementById("metodologia").value;
        contador++;
        var fila = '<tr class="" id="fila'+contador+'" onclick="seleccionar(this.id);"><th>'+semana+'</th><th>'+fecha+'</th><th>'+tema+'</th><th>'+metodologia+'</th>/tr>';
        $('#tabla').append(fila);
    }