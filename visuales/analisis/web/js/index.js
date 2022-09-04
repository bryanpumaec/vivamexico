function index() {
    this.ini = function () {
        console.log("Iniciando...");
        this.getInidicadores();
        this.getDatosGraficas();
        this.getDatosGraficasDona();
        this.getDatosGraficasBarra();
        this.getDatosGraficasBarra2();
    }

    /*-------DATOS TARJETA-----*/

    this.getInidicadores = function () {
        //Vendidos
        $.ajax({
            statusCode: {
                404: function () {
                    console.log("Esta página no existe");
                }
            },
            url: 'php/servidor.php',
            method: 'POST',
            data: {
                rq: "1"
            }
        }).done(function (datos) {
            //toLocaleString 3000 -> 3,000
            //DOM con jQuery
            $("#idVendidos").text(parseFloat(datos).toLocaleString());
        });

    }

        //Almacen
        $.ajax({
            statusCode: {
                404: function () {
                    console.log("Esta página no existe");
                }
            },
            url: 'php/servidor.php',
            method: 'POST',
            data: {
                rq: "2"
            }
        }).done(function (datos) {
            //La lógica 3,000
            $("#idAlmacen").text(parseFloat(datos).toLocaleString());
        });

        //Ingresos
        $.ajax({
            statusCode: {
                404: function () {
                    console.log("Esta página no existe");
                }
            },
            url: 'php/servidor.php',
            method: 'POST',
            data: {
                rq: "3"
            }
        }).done(function (datos) {
            //La lógica 3,000
            $("#idIngreso").text("$"+(datos).toLocaleString());
        });

  /*-------DATOS GRAFICA-----*/

  this.getDatosGraficas = function () {
    $.ajax({
        statusCode: {
            404: function () {
                console.log("Esta página no existe");
            }
        },
        url: 'php/servidor.php',
        method: 'POST',
        data: {
            rq: "4"
        }
    }).done(function (datos) {
        //La lógica
        if (datos != '') {
            let etiquetas = new Array();

            //let tVendidos = new Array();

            let tPrecio = new Array();
            let coloresV = new Array();
            let coloresP = new Array();
            var jDatos = JSON.parse(datos);

            var tablaDatos = document.createElement('tabla');
            tablaDatos.classList.add('table', 'table-striped');
            var tr = document.createElement('tr');
            var th = document.createElement('th');
            th.innerText = "Fecha";
            tr.appendChild(th);
            th = document.createElement('th');

            // th.innerText = "Ventas";
            // tr.appendChild(th);
            // th = document.createElement('th');

            th.innerText = "Ingresos";
            tr.appendChild(th);
            tablaDatos.appendChild(tr);

            for (let i in jDatos) {
                etiquetas.push(jDatos[i].fechaVenta);

                //tVendidos.push(jDatos[i].totalVendidos);

                tPrecio.push(jDatos[i].totalPrecio);
                //coloresV.push("#36004D");
                coloresP.push("#679b6b");

                tr = document.createElement('tr');
                var td = document.createElement("td");
                td.innerText = jDatos[i].fechaVenta;
                tr.appendChild(td);

                // td = document.createElement("td");
                // td.innerText = parseFloat(jDatos[i].totalVendidos).toLocaleString();
                // tr.appendChild(td);

                td = document.createElement("td");
                td.innerText = parseFloat(jDatos[i].totalPrecio).toLocaleString();
                tr.appendChild(td);
                
                tablaDatos.appendChild(tr);
            }

            var idCont = document.getElementById("idContTabla");
            idCont.appendChild(tablaDatos);

            var ctx = document.getElementById('idGrafica').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: etiquetas,
                    datasets: [
                        // {
                        //     label: 'Ventas',
                        //     data: tVendidos,
                        //     backgroundColor: coloresV
                        // },
                        {
                            label: 'Ingresos',
                            data: tPrecio,
                            backgroundColor: coloresP,
                            borderColor: 'rgb(75, 192, 192)',
                        }
                    ]
                }
            });
        }
    });
}
 
//GRAFICA DONA

this.getDatosGraficasDona = function () {
    $.ajax({
        statusCode: {
            404: function () {
                console.log("Esta página no existe");
            }
        },
        url: 'php/servidor.php',
        method: 'POST',
        data: {
            rq: "5"
        }
    }).done(function (datos) {
        //La lógica
        if (datos != '') {
            let etiquetas = new Array();

            //let tVendidos = new Array();

            tCantidad = new Array();
            let coloresV = new Array();
            let coloresP = new Array();
            var jDatos2 = JSON.parse(datos);

            var tablaDatos = document.createElement('tabla');
            tablaDatos.classList.add('table', 'table-striped');
            var tr = document.createElement('tr');
            var th = document.createElement('th');
            th.innerText = "Producto";
            tr.appendChild(th);
            th = document.createElement('th');

            // th.innerText = "Ventas";
            // tr.appendChild(th);
            // th = document.createElement('th');

            th.innerText = "Cantidad";
            tr.appendChild(th);
            tablaDatos.appendChild(tr);

            for (let i in jDatos2) {
                etiquetas.push(jDatos2[i].nombreProducto);

                //tVendidos.push(jDatos[i].totalVendidos);

                tCantidad.push(jDatos2[i].totalCantidad);
                //coloresV.push("#36004D");
                coloresP.push("#679b6b");
                coloresP.push("#55FF33");
                coloresP.push("#33D4FF");
                coloresP.push("#ECFF33");
                coloresP.push("#FF8D33");
                coloresP.push("#33FFE9");
                coloresP.push("#9033FF");
                coloresP.push("#FF33E0");
                coloresP.push("#335BFF");
                coloresP.push("#FF3333");
               

                tr = document.createElement('tr');
                var td = document.createElement("td");
                td.innerText = jDatos2[i].nombreProducto;
                tr.appendChild(td);

                // td = document.createElement("td");
                // td.innerText = parseFloat(jDatos[i].totalVendidos).toLocaleString();
                // tr.appendChild(td);

                td = document.createElement("td");
                td.innerText = parseFloat(jDatos2[i].totalCantidad).toLocaleString();
                tr.appendChild(td);
                
                tablaDatos.appendChild(tr);
            }

            var idCont = document.getElementById("idContTabla2");
            idCont.appendChild(tablaDatos);

            var ctx = document.getElementById('idGrafica2').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: etiquetas,
                    datasets: [
                        // {
                        //     label: 'Ventas',
                        //     data: tVendidos,
                        //     backgroundColor: coloresV
                        // },
                        {
                            label: 'Cantidad',
                            data: tCantidad,
                            backgroundColor: coloresP,
                            borderColor: '#FFFFFF',
                            hoverOffset: 5,
                        },
                    
                    ]
                }
            });
        }
    });

}

//GRAFICA BARRA

this.getDatosGraficasBarra = function () {
    $.ajax({
        statusCode: {
            404: function () {
                console.log("Esta página no existe");
            }
        },
        url: 'php/servidor.php',
        method: 'POST',
        data: {
            rq: "6"
        }
    }).done(function (datos) {
        //La lógica
        if (datos != '') {
            let etiquetas = new Array();

            //let tVendidos = new Array();

            tPrecios = new Array();
            let coloresV = new Array();
            let coloresP = new Array();
            var jDatos3 = JSON.parse(datos);

            var tablaDatos = document.createElement('tabla');
            tablaDatos.classList.add('table', 'table-striped');
            var tr = document.createElement('tr');
            var th = document.createElement('th');
            th.innerText = "Producto";
            tr.appendChild(th);
            th = document.createElement('th');

            // th.innerText = "Ventas";
            // tr.appendChild(th);
            // th = document.createElement('th');

            th.innerText = "Precio";
            tr.appendChild(th);
            tablaDatos.appendChild(tr);

            for (let i in jDatos3) {
                etiquetas.push(jDatos3[i].nombreProducto_barra);

                //tVendidos.push(jDatos[i].totalVendidos);

                tPrecios.push(jDatos3[i].totalPrecio_barra);
                //coloresV.push("#36004D");
                coloresP.push("#679b6b");
                coloresP.push("#55FF33");
                coloresP.push("#33D4FF");
                coloresP.push("#ECFF33");
                coloresP.push("#FF8D33");
                coloresP.push("#33FFE9");
                coloresP.push("#9033FF");
                coloresP.push("#FF33E0");
                coloresP.push("#335BFF");
                coloresP.push("#FF3333");
               

                tr = document.createElement('tr');
                var td = document.createElement("td");
                td.innerText = jDatos3[i].nombreProducto_barra;
                tr.appendChild(td);

                // td = document.createElement("td");
                // td.innerText = parseFloat(jDatos[i].totalVendidos).toLocaleString();
                // tr.appendChild(td);

                td = document.createElement("td");
                td.innerText = parseFloat(jDatos3[i].totalPrecio_barra).toLocaleString();
                tr.appendChild(td);
                
                tablaDatos.appendChild(tr);
            }

            var idCont = document.getElementById("idContTabla3");
            idCont.appendChild(tablaDatos);

            var ctx = document.getElementById('idGrafica3').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: etiquetas,
                    datasets: [
                        // {
                        //     label: 'Ventas',
                        //     data: tVendidos,
                        //     backgroundColor: coloresV
                        // },
                        {
                            label: 'Cantidad',
                            data: tPrecios,
                            backgroundColor: coloresP,
                            borderColor: '#FFFFFF',
                            hoverOffset: 5,
                        },
                    
                    ]
                }
            });
        }
    });

}

//GRAFICA BARRA HORIZONTAL

this.getDatosGraficasBarra2 = function () {
    $.ajax({
        statusCode: {
            404: function () {
                console.log("Esta página no existe");
            }
        },
        url: 'php/servidor.php',
        method: 'POST',
        data: {
            rq: "7"
        }
    }).done(function (datos) {
        //La lógica
        if (datos != '') {
            let etiquetas = new Array();

            //let tVendidos = new Array();

            tPrecios = new Array();
            let coloresV = new Array();
            let coloresP = new Array();
            var jDatos3 = JSON.parse(datos);

            var tablaDatos = document.createElement('tabla');
            tablaDatos.classList.add('table', 'table-striped');
            var tr = document.createElement('tr');
            var th = document.createElement('th');

            th.innerText = "Cedula";
            tr.appendChild(th);
            th = document.createElement('th');

            th.innerText = "Nombre";
            tr.appendChild(th);
            th = document.createElement('th');

             th.innerText = "Direccion";
             tr.appendChild(th);
             th = document.createElement('th');

             th.innerText = "Telefono";
             tr.appendChild(th);
             th = document.createElement('th');

             th.innerText = "Email";
             tr.appendChild(th);
             th = document.createElement('th');

            th.innerText = "Precio";
            tr.appendChild(th);
            tablaDatos.appendChild(tr);

            for (let i in jDatos3) {
                etiquetas.push(jDatos3[i].nombreCliente);

                //tVendidos.push(jDatos[i].totalVendidos);

                tPrecios.push(jDatos3[i].totalPrecio_barra2);
                //coloresV.push("#36004D");
                coloresP.push("#096CD5");
               
               

                tr = document.createElement('tr');

                //DATOS TABLA

                var td = document.createElement("td");
                td.innerText = jDatos3[i].cedula;
                tr.appendChild(td);

                var td = document.createElement("td");
                td.innerText = jDatos3[i].nombreCliente;
                tr.appendChild(td);

                td = document.createElement("td");
                td.innerText =jDatos3[i].direccion;
                tr.appendChild(td);

                var td = document.createElement("td");
                td.innerText = jDatos3[i].telefono;
                tr.appendChild(td);

                var td = document.createElement("td");
                td.innerText = jDatos3[i].email;
                tr.appendChild(td);

                td = document.createElement("td");
                td.innerText = parseFloat(jDatos3[i].totalPrecio_barra2).toLocaleString();
                tr.appendChild(td);
                
                tablaDatos.appendChild(tr);
            }

            var idCont = document.getElementById("idContTabla4");
            idCont.appendChild(tablaDatos);

            var ctx = document.getElementById('idGrafica4').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: etiquetas,
                    datasets: [
                        // {
                        //     label: 'Ventas',
                        //     data: tVendidos,
                        //     backgroundColor: coloresV
                        // },
                        {
                            
                            label: 'Cantidad',
                            data: tPrecios,
                            backgroundColor: coloresP,
                            borderColor: '#FFFFFF',
                            hoverOffset: 5,
                        },
                    
                    ]
                },
                options: {
                    indexAxis:'y',
                }
            });
        }
    });

}


}


var oIndex = new index();
setTimeout(function () { oIndex.ini(); }, 100);