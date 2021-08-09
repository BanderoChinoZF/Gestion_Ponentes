
//DECLARAMOS NUESTRAS FUNCION QUE CARGARA LOS DATOS
//EN CUANTO SE CARGE LA PAGINA

var contenido = document.getElementById("contenido_asistieron");
var contenido2 = document.getElementById("contenido_no_asistieron");
var contenido3 = document.getElementById("table_un_asistente");
//console.log(contenido);


//https://fresnillogestiones.tekio.mx/listar_un_asistente.php?id_empleado=10020

function obtenerAsistente(){

  var c = document.getElementById("input_asistente");

  if(c.value == "")
  {
    //alert('campo vacio');
    swal({
      icon: "warning",
      title: "Atención",
      text: "Ingresa un ID de empleado valido...!!"
    });

  }else{

    var url = 'https://fresnillogestiones.tekio.mx/listar_un_asistente.php?id_empleado='+c.value;

    //CONSULTA A NUESTRA API PARA OBTENER A UN ASISTENTE
    fetch(url)
    .then(response => response.json())
    .then(function(data){
      //console.log(data[0]);
      unaTablaAsistente(data[0]);
    })
  }
}

function unaTablaAsistente(datos){
  //console.log();

  if(datos.idsesion != 0)
  {
    contenido3.innerHTML = `
      <tr>
        <th scope="row">${datos.id_empleado}</th>
        <td scope="col">${datos.nombre_completo}</td>
        <td scope="col">${datos.ubicacion}</td>
        <td scope="col">${datos.departamento}</td>
        <td scope="col"><span class="badge bg-success">Con Asistencia</span></td>
      </tr>
    `;

  }else{
    contenido3.innerHTML = `
      <tr>
        <th scope="row">${datos.id_empleado}</th>
        <td scope="col">${datos.nombre_completo}</td>
        <td scope="col">${datos.ubicacion}</td>
        <td scope="col">${datos.departamento}</td>
        <td scope="col"><span class="badge bg-danger">Sin Asistencia</span></td>
      </tr>
    `;

  }



}

//-------------------------------------------------------------------------------------------------------------------------
function obtenerDatos(){
  //alert('cargando datos');

  //CONSULTA A NUESTRA API PARA OBTENER LOS ASISTENTES
  fetch('http://fresnillogestiones.tekio.mx/lista_asistente.php')
  .then(response => response.json())
  .then(function(data){
    //console.log(data);
    tabla(data);
  })
}

function tabla(datos){
  contenido.innerHTML = '';
  contenido2.innerHTML = '';

  for(let asistente of datos){
    //console.log(asistente.nombre_completo);
    if(asistente.idsesion != 0)
    {
      contenido.innerHTML += `
      <tr>
        <th scope="row">${asistente.id_empleado}</th>
        <td scope="col">${asistente.nombre_completo}</td>
        <td scope="col">${asistente.ubicacion}</td>
        <td scope="col">${asistente.departamento}</td>
        <td scope="col">${asistente.idsesion}</td>
      </tr>
      `;
    }else {
      //EN CASO DE QUE SE DEBA RELLENAR LA TABLA DE NO ASISTENTES
    }
  }
}

//--------------------------------------------------------------------------------------------------------------------
