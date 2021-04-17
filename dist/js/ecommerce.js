$(document).ready(function () {

    $.ajax({
        type: "GET",
        url: "ajax/leerCarrito.php",
        success: function (response) {
            llenaCarrito(JSON.parse(response));
            llenarTablaCarrito(JSON.parse(response));
            llenarTablaPasarela(JSON.parse(response));
        }
    });

    //Cuando leemos el carrito añadimos los registros a la tabla carrito
    function llenarTablaCarrito(response) {
        $("#tablaCarrito tbody").text("");
        var TOTAL = 0;
        response.forEach(element => {
            var precio = parseFloat(element['precio']);
            var totalProd = element['cantidad']*precio;
            TOTAL=TOTAL+totalProd;
            $("#tablaCarrito tbody").append(
                `
                <tr>
                    <td><img src="${element['web_path']}" class="img-size-50"/></td>
                    <td>${element['nombre']}</td>
                    <td>${element['talla']}</td>
                    <td>${element['color']}</td>
                    <td>
                        ${element['cantidad']}
                        <button type="button" class="btn-xs btn-primary mas" 
                        data-id="${element['id']}"
                        data-tipo="mas"
                        >+</button>
                        <button type="button" class="btn-xs btn-danger menos" 
                        data-id="${element['id']}"
                        data-tipo="menos"
                        >-</button>
                    </td>
                    <td>$${precio.toFixed(2)}</td>
                    <td>$${totalProd.toFixed(2)}</td>
                    <td><i class="fa fa-trash text-danger borrarProducto" data-id="${element['id']}" ></i></td>
                <tr>
                `
            );
        });
        $("#tablaCarrito tbody").append(
            `
            <tr>
                <td colspan="4" class="text-right"><strong>Total:</strong></td>
                <td>$${TOTAL.toFixed(2)}</td>
                <td></td>
            <tr>
            `
        );
    }

    function llenarTablaPasarela(response) {
        $("#tablaPasarela tbody").text("");
        var TOTAL = 0;
        response.forEach(element => {
            var precio = parseFloat(element['precio']);
            var totalProd = element['cantidad']*precio;
            TOTAL =TOTAL+totalProd;
            $("#tablaPasarela tbody").append(
                `
                <tr>
                    <td><img src="${element['web_path']}" class="img-size-50"/></td>
                    <td>${element['nombre']}</td>
                    <td>
                        ${element['cantidad']}
                        <input type="hidden" name="id[]" value="${element['id']}">
                        <input type="hidden" name="cantidad[]" value="${element['cantidad']}">
                        <input type="hidden" name="precio[]" value="${precio.toFixed(2)}">
                    </td>
                    <td>$${precio.toFixed(2)}</td>
                    <td>$${totalProd.toFixed(2)}</td>
                <tr>
                `
            );
        });
        $("#tablaPasarela tbody").append(
            `
            <tr>
                <td colspan="4" class="text-right"><strong>Total:</strong></td>
                <td>
                $${TOTAL.toFixed(2)}
                <input type="hidden" name="total" value="${TOTAL.toFixed(2) * 100}" >
                </td>
            <tr>
            `
        );
    }
    $(document).on("click", ".mas,.menos", function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var tipo = $(this).data('tipo');
        $.ajax({
            type: "post",
            url: "ajax/cambiaCantidadProductos.php",
            data: { "id": id, "tipo": tipo },
            dataType: "json",
            success: function (response) {
                llenarTablaCarrito(response);
                llenaCarrito(response);
            }
        });
    });
    $(document).on("click", ".borrarProducto", function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            type: "post",
            url: "ajax/borrarProductoCarrito.php",
            data: { "id": id },
            dataType: "json",
            success: function (response) {
                llenarTablaCarrito(response);
                llenaCarrito(response);
            }
        });
    });

    $("#agregarCarrito").click(function (e) {
        e.preventDefault();
        var id = String($(this).data('id')).trim();
        var nombre = String($(this).data('nombre')).trim();
        var web_path = String($(this).data('web_path')).trim();
        var cantidad = String($("#cantidadProducto").val()).trim();
        var precio = String($(this).data('precio')).trim();

        var colors = document.getElementsByName("color_option");
        for (i = 0; i < colors.length; i++) {
            if (colors[i].type == "radio" && colors[i].checked) {
                var color = colors[i].value;
            }
        }
        var tallas = document.getElementsByName("talla_option");
        for (i = 0; i < tallas.length; i++) {
            if (tallas[i].type == "radio" && tallas[i].checked) {
                var talla = tallas[i].value;
            }
        }

        console.log("SELECCIONASTE -> ", cantidad, nombre, color,"talla", talla);

        let data = {
            "id": id,
            "nombre": nombre,
            "web_path": web_path,
            "cantidad": cantidad,
            "precio": precio,
            "color": color,
            "talla": talla
        };

        $.ajax({
            type: "POST",
            url: "ajax/agregarCarrito.php",
            data: data,
            //dataType: "json",
            success: function (response) {
                console.log("Producto añadido al carrito.");
                llenaCarrito(JSON.parse(response));
                //Creo el efecto de parpadeo del carrito cuando añades un nuevo producto
                $("#badgeProducto").hide(500).show(500).hide(500).show(500).hide(500).show(500);
                //Añado un click para que muestre pestañaa miniatura con el detalle al añadir nuevo producto
                $("#iconoCarrito").click();
            }
        })
    });


    //Función para recibir la lista de productos
    function llenaCarrito(response) {
        console.log("Llena carrito");
        let cantidad = response.length;
        console.log(cantidad);
        if (cantidad>0) {
            $("#badgeProducto").text(cantidad);
        } else {
            $("#badgeProducto").text("");
        }
        $("#listaCarrito").text("");
        response.forEach(element => {
            $("#listaCarrito").append(
                `
                <a href="index1.php?modulo=detalleproducto&id=${element['id']}" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="${element['web_path']}" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                ${element['nombre']}
                                <span class="float-right text-sm text-primary"><i class="fas fa-eye"></i></span>
                            </h3>
                            <p class="text-sm">Cantidad ${element['cantidad']}</p>
                            <p class="text-sm">Color ${element['color']}</p>
                            <p class="text-sm">Talla ${element['talla']}</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                `
            );
        });

        //Añadoado la lista de productos con botones para ver o borrar carrito
        $("#listaCarrito").append(
            `
            <a href="index1.php?modulo=carrito" class="dropdown-item dropdown-footer text-primary">
                Ver carrito 
                <i class="fa fa-cart-plus"></i>
            <a href="#" class="dropdown-item dropdown-footer text-danger" id="borrarCarrito">
                Borrar carrito 
                <i class="fa fa-trash"></i>
            </a>
            `
        );
    }

    $(document).on("click", "#borrarCarrito", function (e) {
        e.preventDefault();
        alert("#borrarCarrito");
        $.ajax({
            type: "post",
            url: "ajax/borrarCarrito.php",
            dataType: "json",
            success: function (response) {
                llenaCarrito(response);
            }
        });
    });
    var nombreRec = $("#nombreRec").val();
    var emailRec = $("#emailRec").val();
    var direccionRec = $("#direccionRec").val();
    $("#jalar").click(function (e) {
        var nombre = $("#nombre").val();
        var email = $("#email").val();
        var direccion = $("#direccion").val();

        if ($(this).prop("checked") == true) {
            $("#nombreRec").val(nombre);
            $("#emailRec").val(email);
            $("#direccionRec").val(direccion);
        } else {
            $("#nombreRec").val(nombreRec);
            $("#emailRec").val(emailRec);
            $("#direccionRec").val(direccionRec);
        }

    });


    //Para que funcione el click al carrito

    $('#iconoCarrito').children('i, span.badge').click((e)=>{
        e.stopPropagation();
        $('#iconoCarrito').click();
    });
});