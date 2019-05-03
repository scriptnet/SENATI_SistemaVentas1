var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e){
		guardaryeditar(e);
	});

	$.post("../ajax/articulo.php?op=selectCategoria", function(r){ 
		console.log(r);
             $("#idcategoria").html(r); 
             $('#idcategoria').selectpicker('refresh'); 
 	});
}

//Función limpiar
function limpiar()
{
		$("#idcategoria").val("");
			$("#codigo").val("");
			$("#nombre").val("");
			$("#stock").val("");
			$("#imagen").val("");
			$("#descripcion").val("");
			$("#idarticulo").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/articulo.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función para guardar o editar

function guardaryeditar (e){
	e.preventDefault(); //no se active la accío predeterminada del evento
	$("#btnGuardar").prop("disabled",true);

	var formdata = new FormData($("#formulario")[0]);
	
	$.ajax({
		url: "../ajax/articulo.php?op=guardaryeditar",
		type: "POST",
		data: formdata,
		contentType: false,
		processData: false,

		success: function(datos){
			bootbox.alert(datos);
			mostrarform(false);
			tabla.ajax.reload();
			console.log(datos)

		}


	});

	limpiar();
}

function mostrar(idarticulo){

	$.post("../ajax/articulo.php?op=mostrar",{idarticulo:idarticulo}, function(data, status)
		
		{
			data= JSON.parse(data);
			console.log(data.imagen);
			mostrarform(true);
			$("#idcategoria").val(data.idcategoria);
			$("#codigo").val(data.codigo);
			$("#nombre").val(data.nombre);
			$("#stock").val(data.stock);
			$("#imagen").val(data.imagen);
			$("#descripcion").val(data.descripcion);
			$("#idarticulo").val(data.idarticulo);
		});
};

function desactivar(idarticulo){
	bootbox.confirm("Estas seguro de desactivar la articulo", function(result){
		if (result) {
			$.post("../ajax/articulo.php?op=desactivar", {idarticulo:idarticulo}, function(e){
				bootbox.alert(e);
					tabla.ajax.reload();
			})
		}
	})
}
function activar(idarticulo){
	bootbox.confirm("Estas seguro de activar la articulo", function(result){
		if (result) {
			$.post("../ajax/articulo.php?op=activar", {idarticulo:idarticulo}, function(e){
				bootbox.alert(e);
					tabla.ajax.reload();
			})
		}
	})
}
init();