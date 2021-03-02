

    <!-- SCRIPT PROPIOS-->
    <script src="<?php echo constant('URL')?>config/js/news/Page.js"></script>
    <script src="<?php echo constant('URL')?>config/js/news/Numeros.js"></script>
    <script src="<?php echo constant('URL')?>config/js/news/Alertas.js"></script>
    <script src="<?php echo constant('URL')?>config/js/news/Botones.js"></script>
    <script src="<?php echo constant('URL')?>config/js/news/Foto.js"></script>
    <script src="<?php echo constant('URL')?>config/js/news/Lista.js"></script>
<!--     <script src="<?php echo constant('URL')?>config/js/news/Titulos.js"></script> -->
    <script src="<?php echo constant('URL')?>config/js/news/Captcha.js"></script>
    <!-- SCRIPTS MONSTER --> 
    
    <script src="<?php echo constant('URL')?>config/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo constant('URL')?>config/plugins/bootstrap/js/tether.min.js"></script>
    <script src="<?php echo constant('URL')?>config/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo constant('URL')?>config/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo constant('URL')?>config/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo constant('URL')?>config/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo constant('URL')?>config/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo constant('URL')?>config/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo constant('URL')?>config/js/custom.min.js"></script>

    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="<?php echo constant('URL')?>config/plugins/chartist-js/dist/chartist.min.js"></script>
    <!-- Chart JS -->
    <script src="<?php echo constant('URL')?>config/plugins/echarts/echarts-all.js"></script>
    <script src="<?php echo constant('URL')?>config/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Chart JS -->
    <script src="<?php echo constant('URL')?>config/plugins/Chart.js/Chart.min.js"></script>
    <script src="<?php echo constant('URL')?>config/js/dashboard2.js"></script>

    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo constant('URL')?>config/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <script src="<?php echo constant('URL')?>config/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo constant('URL')?>config/plugins/bootstrap/js/tether.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo constant('URL')?>config/js/jquery.slimscroll.js"></script>
    
     <!-- Plugin JavaScript -->
    <script src="<?php echo constant('URL')?>config/plugins/moment/moment.js"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="<?php echo constant('URL')?>config/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="<?php echo constant('URL')?>config/plugins/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
    <script src="<?php echo constant('URL')?>config/plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
    <script src="<?php echo constant('URL')?>config/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="<?php echo constant('URL')?>config/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="<?php echo constant('URL')?>config/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo constant('URL')?>config/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Footable -->
    <script src="<?php echo constant('URL')?>config/plugins/footable/js/footable.all.min.js"></script>
    <script src="<?php echo constant('URL')?>config/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <!--FooTable init-->
    <script src="<?php echo constant('URL')?>config/js/footable-init.js"></script>
    <!-- Sweetalert-->
    <script src="<?php echo constant('URL')?>config/js/sweetalert.min.js"></script>

    <!--Custom JavaScript -->
    <script src="<?php echo constant('URL')?>config/plugins/wizard/jquery.steps.min.js"></script>
    <script src="<?php echo constant('URL')?>config/plugins/wizard/jquery.validate.min.js"></script>
    <script src="<?php echo constant('URL')?>config/plugins/wizard/steps.js"></script>

   
    <!-- FullCalendar -->
    
    <script src='<?php echo constant('URL')?>config/plugins/calendar/dist/locale/es.js'></script>


    <script src="<?php echo constant('URL')?>config/plugins/calendar/jquery-ui.min.js"></script>
    <script src="<?php echo constant('URL')?>config/plugins/moment/moment.js"></script>
    <script src='<?php echo constant('URL')?>config/plugins/calendar/dist/fullcalendar.js'></script>
    <script src="<?php echo constant('URL')?>config/plugins/calendar/dist/cal-init.js"></script>




        <script type="text/javascript">
        function deleteElement(tabla,id,descripcion){
            var mensaje="";
            var funcion="";
            switch(tabla){
                case "usuario":
                mensaje='eliminar al usuario';
                funcion="Eliminar";
                break;
                case "secciones":
                mensaje="eliminar la sección";
                funcion="Eliminar";
                break;
                case "docente":
                mensaje="eliminar al docente";
                funcion="Eliminar";
                break;
                case "aula":
                mensaje="eliminar el aula";
                funcion="Eliminar";
                break;
                 case "unidad":
                mensaje="eliminar la unidad curricular";
                funcion="Eliminar";
                break;
                case "cohorte" :
                mensaje="desactivar el cohorte";
                funcion="Desactivar";
                break;
            };
            swal({
                    title: "Atención",
                    text: "Estas por "+mensaje+" '"+descripcion+"'.    ¿Deseas continuar?",
                    type: "warning",
                    showConfirmButton:true,
                    showCancelButton:true,
                    confirmButtonText:'Continuar',
                    cancelButtonText:'Cancelar',
                
                }, function(isConfirm){
                    if(isConfirm){
                     location.href="http://localhost/dashboard/www/System%20HOD%20V2/"+tabla+"/"+funcion+"/"+id;
                    }
                    else{}
                }
                );
        }
    </script>

    <script type="text/javascript">
        function ActivarCohorte(id){
           location.href="http://localhost/dashboard/www/System%20HOD%20V2/cohorte/Activar/"+id;
        }
    </script>

         <script type="text/javascript">
        
         function chargePermisos(usuario,rol){
          if(rol=="Usuario"){
            document.getElementById("ver-consultar-acceder").innerHTML="Consultar";
          }
          else{
            document.getElementById("ver-consultar-acceder").innerHTML="Acceder";
          }

           $.ajax({
              type:'POST',
              url:'http://localhost/dashboard/www/System%20HOD%20V2/seguridad/obtenerPermisos',
             data:{"usuario":usuario},
     })
           .done(function(datos){
            document.getElementById('body-permisos').innerHTML=datos;
           });
         }

         function cambiarRegistrar(permiso,idPUM,usuario){
           $.ajax({
              type:'POST',
              url:'http://localhost/dashboard/www/System%20HOD%20V2/seguridad/cambiarRegistrar',
             data:{'permiso':permiso,'idPUM':idPUM},
     })
           .done(function(datos){
chargePermisos(usuario); 
              
           });
         }


                  function cambiarConsultar(permiso,idPUM,usuario){
           $.ajax({
              type:'POST',
              url:'http://localhost/dashboard/www/System%20HOD%20V2/seguridad/cambiarConsultar',
             data:{'permiso':permiso,'idPUM':idPUM},
     })
           .done(function(datos){
chargePermisos(usuario); 
              
           });
         }

                           function cambiarModificar(permiso,idPUM,usuario){
           $.ajax({
              type:'POST',
              url:'http://localhost/dashboard/www/System%20HOD%20V2/seguridad/cambiarModificar',
             data:{'permiso':permiso,'idPUM':idPUM},
     })
           .done(function(datos){
chargePermisos(usuario); 
              
           });
         }

                                    function cambiarReportar(permiso,idPUM,usuario){
           $.ajax({
              type:'POST',
              url:'http://localhost/dashboard/www/System%20HOD%20V2/seguridad/cambiarReportar',
             data:{'permiso':permiso,'idPUM':idPUM},
     })
           .done(function(datos){
chargePermisos(usuario); 
              
           });
         }


                                    function cambiarEliminar(permiso,idPUM,usuario){
           $.ajax({
              type:'POST',
              url:'http://localhost/dashboard/www/System%20HOD%20V2/seguridad/cambiarEliminar',
             data:{'permiso':permiso,'idPUM':idPUM},
     })
           .done(function(datos){
chargePermisos(usuario); 
              
           });
         }


   function rolUserSelected(rol,cedula,contrasenia){
      document.getElementById("rol_user").value=rol;
      document.getElementById("cedulaOculta").value=cedula;
      document.getElementById("contrasenia-editar").value=contrasenia;
      document.getElementById("rolOculto").value=rol;
   }

   function mostrarClaveEditar(){
    if(document.getElementById('contrasenia-editar').type=="password"){
      document.getElementById('contrasenia-editar').type='text';
      document.getElementById("botonVer").className="mdi mdi-eye-off";
    }else{
      document.getElementById('contrasenia-editar').type='password';
       document.getElementById("botonVer").className="mdi mdi-eye";
    }
   }

    function guardarRolUSer(){
        var nuevoRol=document.getElementById("rol_user").value;
        var cedula=document.getElementById("cedulaOculta").value;
        var contrasenia=document.getElementById("contrasenia-editar").value;

        if(nuevoRol==document.getElementById("rolOculto").value){
                                  swal({
        title: "Antes de guardar los cambios...",
        text:"¿Desea reestablecer los permisos por defecto para el rol de este usuario?",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "No",
        confirmButtonColor: "blue",
        confirmButtonText: "Sí",
        },
        function (isConfirm) {
            if(isConfirm){

                  nuevoRol=nuevoRol;

    

             $.ajax({
              type:'POST',
              url:'http://localhost/dashboard/www/System%20HOD%20V2/seguridad/cambiarRolUser',
             data:{'cedula':cedula, 'rol':nuevoRol, 'contrasenia':contrasenia},
     })
           .done(function(datos){

                               swal({
                     title: "Éxito",
                     text: "Se han guardado los cambios exitosamente",
                     type: "success",
                     showConfirmButton:false,
                     timer:2000
                 });
            location.reload();
              
           });          

    
            }else{
                nuevoRol='sin cambios';
    

             $.ajax({
              type:'POST',
              url:'http://localhost/dashboard/www/System%20HOD%20V2/seguridad/cambiarRolUser',
             data:{'cedula':cedula, 'rol':nuevoRol, 'contrasenia':contrasenia},
     })
           .done(function(datos){
           

                                   swal({
                     title: "Éxito",
                     text: "Se han guardado los cambios exitosamente",
                     type: "success",
                     showConfirmButton:false,
                     timer:2000
                 });

            location.reload();
              
           });
            }
        });
        }

        else{


                         $.ajax({
              type:'POST',
              url:'http://localhost/dashboard/www/System%20HOD%20V2/seguridad/cambiarRolUser',
             data:{'cedula':cedula, 'rol':nuevoRol, 'contrasenia':contrasenia},
     })
           .done(function(datos){
            swal({
                     title: "Éxito",
                     text: "Se han guardado los cambios exitosamente",
                     type: "success",
                     showConfirmButton:false,
                     timer:2000
                 });

            location.reload();
              
           });
        }



    }



     </script>

     <script type="text/javascript">
       function editarUsuario(cedula,nombre,apellido,fecha,correo){
        document.getElementById("cedula-editar").value=cedula;
        document.getElementById("cedula-editar").readOnly="readOnly";
        document.getElementById("nombre1-editar").value=nombre;
        document.getElementById("apellido1-editar").value=apellido;
        document.getElementById("fecha-editar").value=fecha;
        document.getElementById("correo-editar").value=correo;
       }


       function guardarUsuarioEditado(){
        var cedula=document.getElementById("cedula-editar");
        var nombre=document.getElementById("nombre1-editar");
        var apellido=document.getElementById("apellido1-editar");
        var fecha=document.getElementById("fecha-editar");
        var correo=document.getElementById("correo-editar");

        if(nombre.value==''){
                    swal({
                    title: "Atención",
                    text: "El campo nombre no puede estar vacío",
                    type: "warning",
                    showConfirmButton:false,
                    timer:2000
                });
        }
        else{
          if(apellido.value==''){
                                swal({
                    title: "Atención",
                    text: "El campo apellido no puede estar vacío",
                    type: "warning",
                    showConfirmButton:false,
                    timer:2000
                });
          }
          else{
            if(fecha.value==''){
                                  swal({
                    title: "Atención",
                    text: "El campo fecha de nacimiento no puede estar vacío",
                    type: "warning",
                    showConfirmButton:false,
                    timer:2000
                });
            }
            else{
              if(correo.value==''){
                                    swal({
                    title: "Atención",
                    text: "El campo correo electrónico no puede estar vacío",
                    type: "warning",
                    showConfirmButton:false,
                    timer:2000
                });
              }
              else{

                var usuario=new Object();
                usuario['cedula']=cedula.value;
                usuario['nombre']=nombre.value;
                usuario['apellido']=apellido.value;
                usuario['fecha']=fecha.value;
                usuario['correo']=correo.value;
             $.ajax({
              type:'POST',
              url:'http://localhost/dashboard/www/System%20HOD%20V2/usuario/Editar',
             data:{'usuario':usuario},
     })
           .done(function(datos){
            
             if(datos==1){
            location.reload();
          }
          else{
            alert(datos);
          }
              
           });
              }
            }
          }
        }
       }

     </script>

     <script type="text/javascript">
       function editarUC(unidad,trayecto,fase,idEjeForm,idUnidad){



        document.getElementById("idOcultoUnidad").value=idUnidad;
       document.getElementById("nombreUnidadEditar").value=unidad;
       document.getElementById("trayectoUnidadEditar").value=parseInt(trayecto);
       document.getElementById("faseUnidadEditar").value=fase;
        document.getElementById("ejeEditarUnidad").value=idEjeForm;
       
       }


       function guardarUnidadEditada(){
       var nombre=document.getElementById("nombreUnidadEditar");
       var trayecto=document.getElementById("trayectoUnidadEditar");
       var fase=document.getElementById("faseUnidadEditar");
       var  ejeUnidad=document.getElementById("ejeEditarUnidad");
       var unidadC=document.getElementById("idOcultoUnidad");
 
       if(nombre.value==''){
                       swal({
                    title: "Atención",
                    text: "El campo nombre de la unidad curricular no puede estar vacío",
                    type: "warning",
                    showConfirmButton:false,
                    timer:2000
                });
       }

       else{
           
           var unidadCompleta=new Object();
           unidadCompleta['nombre']=nombre.value;
           unidadCompleta['trayecto']=trayecto.value;
           unidadCompleta['fase']=fase.value;
           unidadCompleta['eje']=ejeUnidad.value;
           unidadCompleta['id']=unidadC.value;

           $.ajax({
              type:'POST',
              url:'http://localhost/dashboard/www/System%20HOD%20V2/unidad/Editar',
             data:{'UC':unidadCompleta},
     })
           .done(function(datos){

            if(datos==1){
               
                         swal({
                    title: "¡Éxito!",
                    text: "Los cambios se han guardado exitosamente",
                    type: "success",
                    showConfirmButton:false,
                    timer:2000
                  
                });
         
                location.reload();
              }
              else{alert(datos);}

           });
       }


       }
     </script>


 
     