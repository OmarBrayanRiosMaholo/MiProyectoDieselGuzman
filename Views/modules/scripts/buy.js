var tabla;

//funcion que se ejecuta al inicio
function init() {
	mostrarform(false);
	listar();

	$("#formulario").on("submit", function (e) {
		guardaryeditar(e);
	});

	//cargamos los items al select proveedor
	$.post("Controllers/Buy.php?op=selectProveedor", function (r) {
		$("#idproveedor").html(r);
		//$("#idproveedor").selectpicker("refresh");
	});
}

//funcion limpiar
function limpiar() {
	$("#idproveedor").val("");
	$("#proveedor").val("");
	$("#serie_comprobante").val("");
	$("#num_comprobante").val("");

	$("#total_compra").val("");
	$(".filas").remove();
	$("#total").html("0");

	//obtenemos la fecha actual
	var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear() + "-" + month + "-" + day;
	$("#fecha_hora").val(today);

	//marcamos el primer tipo_documento
	$("#tipo_comprobante").val("Boleta");
	//$("#tipo_comprobante").selectpicker("refresh");
	//$("#idproveedor").selectpicker("refresh");
}

//funcion mostrar formulario
function mostrarform(flag) {
	limpiar();
	if (flag) {
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		//$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		listarArticulos();

		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		detalles = 0;
		$("#btnAgregarArt").show();
	} else {
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//cancelar form
function cancelarform() {
	limpiar();
	mostrarform(false);
}

//funcion listar
function listar() {
	tabla = $("#tbllistado")
		.dataTable({
			language: {
				decimal: "",
				emptyTable: "No hay información",
				info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
				infoEmpty: "Mostrando 0 to 0 of 0 Entradas",
				infoFiltered: "(Filtrado de _MAX_ total entradas)",
				infoPostFix: "",
				thousands: ",",
				lengthMenu: "Mostrar _MENU_ Entradas",
				loadingRecords: "Cargando...",
				processing: "Procesando...",
				search: "Buscar:",
				zeroRecords: "Sin resultados encontrados",
				paginate: {
					first: "Primero",
					last: "Ultimo",
					next: "Siguiente",
					previous: "Anterior",
				},
			},
			aProcessing: true, //activamos el procedimiento del datatable
			aServerSide: true, //paginacion y filrado realizados por el server
			dom: "Bfrtip", //definimos los elementos del control de la tabla
			buttons: [
				{
					extend: "excelHtml5",
					text: '<i class="fa fa-file-excel-o bg-green"></i> Excel',
					titleAttr: "Exportar a Excel",
					title: "Reporte de Ingresos",
					sheetName: "Ingresos",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6, 7],
					},
				},
				{
					extend: "pdfHtml5",
					text: '<i class="fa fa-file-pdf-o bg-red"></i> PDF',
					titleAttr: "Exportar a PDF",
					title: "Reporte de Ingresos",
					pageSize: "A4",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6, 7],
					},
				},
			],
			ajax: {
				url: "Controllers/Buy.php?op=listar",
				type: "get",
				dataType: "json",
				error: function (e) {
					console.log(e.responseText);
				},
			},
			bDestroy: true,
			iDisplayLength: 15, //paginacion
			order: [[0, "desc"]], //ordenar (columna, orden)
		})
		.DataTable();
}

function listarArticulos() {
	tabla = $("#tblarticulos")
		.dataTable({
			language: {
				decimal: "",
				emptyTable: "No hay información",
				info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
				infoEmpty: "Mostrando 0 to 0 of 0 Entradas",
				infoFiltered: "(Filtrado de _MAX_ total entradas)",
				infoPostFix: "",
				thousands: ",",
				lengthMenu: "Mostrar _MENU_ Entradas",
				loadingRecords: "Cargando...",
				processing: "Procesando...",
				search: "Buscar:",
				zeroRecords: "Sin resultados encontrados",
				paginate: {
					first: "Primero",
					last: "Ultimo",
					next: "Siguiente",
					previous: "Anterior",
				},
			},
			aProcessing: true, //activamos el procedimiento del datatable
			aServerSide: true, //paginacion y filrado realizados por el server
			dom: "Bfrtip", //definimos los elementos del control de la tabla
			buttons: [],
			ajax: {
				url: "Controllers/Buy.php?op=listarArticulos",
				type: "get",
				dataType: "json",
				error: function (e) {
					console.log(e.responseText);
				},
			},
			bDestroy: true,
			iDisplayLength: 10, //paginacion
			order: [[0, "desc"]], //ordenar (columna, orden)
		})
		.DataTable();
}

//funcion para guardaryeditar
function guardaryeditar(e) {
	e.preventDefault(); //no se activara la accion predeterminada
	//$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "Controllers/Buy.php?op=guardaryeditar",
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,

		success: function (datos) {
			var tabla = $("#tbllistado").DataTable();
			Swal.fire({
				title: "Registro",
				text: datos,
				icon: "info",
			}),
				mostrarform(false);
			tabla.ajax.reload();
		},
	});

	limpiar();
}

function mostrar(idingreso) {
	$("#getCodeModal").modal("show");
	$.post(
		"Controllers/Buy.php?op=mostrar",
		{ idingreso: idingreso },
		function (data, status) {
			data = JSON.parse(data);

			$("#idproveedorm").val(data.proveedor);
			$("#tipo_comprobantem").val(data.tipo_comprobante);
			$("#serie_comprobantem").val(data.serie_comprobante);
			$("#num_comprobantem").val(data.num_comprobante);
			$("#fecha_horam").val(data.fecha);
		}
	);
	$.post("Controllers/Buy.php?op=listarDetalle&id=" + idingreso, function (r) {
		$("#detallesm").html(r);
	});
}

function anular(idingreso) {
	Swal.fire({
		title: "Anular?",
		text: "Esá seguro de anular el ingreso?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonText: 'Si, anular!',
		cancelButtonText: 'Cancelar'
	}).then((result) => {
		if (result.isConfirmed) {
			$.post(
				"Controllers/Buy.php?op=anular",
				{ idingreso: idingreso },
				function (e) {
					Swal.fire(
						e,
						"Anulado!",
						"success"
					);
					var tabla = $("#tbllistado").DataTable();
					tabla.ajax.reload();
				}
			);
		}
	});
}

//declaramos variables necesarias para trabajar con las compras y sus detalles
var cont = 0;
var detalles = 0;
$("#btnGuardar").hide();

function agregarDetalle(idarticulo, articulo) {
	var cantidad = 1;
	var precio_compra = 1;
	var precio_venta = 1;

	if (idarticulo != "") {
		var subtotal = cantidad * precio_compra;
		var fila =
			'<tr class="filas" id="fila' +
			cont +
			'">' +
			'<td><button type="button" class="btn btn-danger btn-sm" onclick="eliminarDetalle(' +
			cont +
			')">X</button></td>' +
			'<td><input type="hidden" name="idarticulo[]" value="' +
			idarticulo +
			'">' +
			articulo +
			"</td>" +
			'<td><input type="number" name="cantidad[]" id="cantidad[]" value="' +
			cantidad +
			'"></td>' +
			'<td><input type="number" step="0.01" name="precio_compra[]" id="precio_compra[]" value="' +
			precio_compra +
			'"></td>' +
			'<td><input type="number" step="0.01" name="precio_venta[]" value="' +
			precio_venta +
			'"></td>' +
			'<td><span name="subtotal" id="subtotal' +
			cont +
			'">' +
			subtotal +
			"</span></td>" +
			"</tr>";
		cont++;
		detalles = detalles + 1;
		$("#detalles").append(fila);
		modificarSubtotales();
		evaluar();
	} else {
		alert("Error al ingresar el detalle, revisar las datos del artículo");
	}
}

function borrar_filas() {
	// Habilitar todos los botones
	$('#tblarticulos tbody tr #addetalle').prop("disabled", false);

	// Obtener todos los valores de los input[name="idarticulo[]"]
	const valores = $('input[name="idarticulo[]"]').map(function () {
		return this.value;
	}).get();

	// Iterar sobre cada fila de la tabla
	$('#tblarticulos tbody tr').each(function () {
		const boton = $(this).find('#addetalle');
		const nombre = boton.attr("name");

		// Verificar si el nombre del botón está en la lista de valores
		if (valores.includes(nombre)) {
			boton.prop("disabled", true);
		}
	});
}


function modificarSubtotales() {
	var cant = document.getElementsByName("cantidad[]");
	var prec = document.getElementsByName("precio_compra[]");
	var sub = document.getElementsByName("subtotal");

	for (var i = 0; i < cant.length; i++) {
		var inpC = cant[i];
		var inpP = prec[i];
		var inpS = sub[i];

		inpS.value = inpC.value * inpP.value;
		document.getElementsByName("subtotal")[i].innerHTML = inpS.value.toFixed(2);
	}

	calcularTotales();
}

function calcularTotales() {
	var sub = document.getElementsByName("subtotal");
	var total = 0.0;

	for (var i = 0; i < sub.length; i++) {
		total += parseFloat(sub[i].value);
	}

	$("#total").html(total.toFixed(2));
	$("#total_compra").val(total.toFixed(2));
	$("#most_total").html(total.toFixed(2));

	evaluar();
	borrar_filas();
}


function evaluar() {
	if (detalles > 0) {
		$("#btnGuardar").show();
	} else {
		$("#btnGuardar").hide();
		cont = 0;
	}
}



//funcion para eliminar un detalle
function eliminarDetalle(indice) {
	$("#fila" + indice).remove();
	calcularTotales();
	detalles = detalles - 1;
	if (detalles <= 0) {
		$("#btnGuardar").hide();
		cont = 0;
	}
}

init();
