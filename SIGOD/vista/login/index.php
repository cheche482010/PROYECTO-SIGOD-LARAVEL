<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include (call."Meta.php"); ?>
        <?php include (call."Link.php"); ?>
        <?php include (call."Title.php"); ?>
        <div class="preloader">
            <svg class="circular" viewbox="25 25 50 50">
                <circle class="path" cx="50" cy="50" fill="none" r="20" stroke-miterlimit="10" stroke-width="2">
                </circle>
            </svg> 
        </div> 
    </head>
    <body class="fix-header fix-sidebar card-no-border">
<!-- ============================================================== -->
<!-- Inicio contenido de pagina -->
<!-- ============================================================== -->
 <div id="main-wrapper" style="background-image: url(<?php echo constant('URL')?>config/img/background/fond.jpg);background-size: cover; height: auto;"> 

<header class="topbar" style="height: 50px;"> 
    
</header>

    <div class="container-fluid" >

    
    <div class="row" style="margin-bottom: 50px;">
        <div class="col-6">
            <div class="card" style="border: 2px solid gray;">
                <div class="card-block" >
                    <div class="panel-heading text-center" style="background: transparent;">
            <img src="<?php echo constant('URL')?>config/img/web/uptaeb.jpg" width="80"> 
        </div>
                </div>

                <form action="<?php echo constant('URL'); ?>login/Ingresar" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                    <input type="hidden" id="modulo" name="modulo" value="login">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                
                                <div class="col-md-12 ">
                                    <label for="cedula">
                                        Cedula
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="mdi mdi-account-star">
                                            </i>
                                        </div>
                                        <input type="text"  class="form-control input-number" id="cedula" name="cedula" placeholder="Cedula">
                                    </div>
                                        <div id="mensajeCedula" style="color:red;">
                                    </div>
                                </div>
                                <div class="col-md-12 m-t-10">
                                    <label for="password">
                                        Contraseña
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <a href="javascript:void(0);" type="button" class="btn" style="margin: 0px;padding: 0px;" id="mostrar">
                                                <img id="candado" src="<?php echo constant('URL').web; ?>mostrar.png" style="width: 15px; height: 15px;">
                                            </a>
                                        </div>
                                        <input type="password" class="form-control espacios" name="password" id="password" placeholder="Contraseña">
                                    </div> 
                                        <div id="mensajeClave" style="color:red;">
                                    
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-12 text-center">
                                <a href="#myModal" role="button" class="btn" data-toggle="modal">
                                    <label class="text-themecolor">He olvidado mi contraseña</label>
                                </a>

                                <?php include privado."recuperar_contraseña.php"; ?>
                            </div>

                            <div class="col-12"> 
                            <img  style="border: 1px solid gray;width: 100%;height: 70%;" id="captcha" src="<?php echo constant('URL').privado."securimage/securimage_show.php"; ?>" alt="CAPTCHA Image" />
                            
                        <div id="captcha_image_audio_div">
                            <audio id="captcha_image_audio" preload="none" style="display: none">
                              <source id="captcha_image_source_wav" src="<?php echo constant('URL').privado."securimage/"; ?>securimage_play.php?id=1234" type="audio/wav">
                              <object type="application/x-shockwave-flash" data="securimage_play.swf?bgcol=%23ffffff&amp;icon_file=images%2Faudio_icon.png&amp;audio_file=securimage_play.php" height="32" width="32">
                                <param name="movie" value="securimage_play.swf?bgcol=%23ffffff&amp;icon_file=images%2Faudio_icon.png&amp;audio_file=securimage_play.php" />
                              </object>
                            </audio>
                        </div>

                        <div id="captcha_image_audio_controls">
                            <a tabindex="-1" class="captcha_play_button" href="<?php echo constant('URL').privado."securimage/"; ?>securimage_play.php?id=1234 ?>" onclick="return false">
                            <img class="captcha_play_image" height="32" width="32" src="<?php echo constant('URL').privado."securimage/"; ?>images/audio_icon.png" alt="Play CAPTCHA Audio" style="border: 0px">
                            <img class="captcha_loading_image rotating" height="32" width="32" src="<?php echo constant('URL').privado."securimage/"; ?>images/loading.png" alt="Loading audio" style="display: none">
                            </a>

                        <noscript>Habilitar Javascript para controles de audio</noscript>

                            <a tabindex="-1" href="javascript:void(0)" onclick="document.getElementById('captcha').src = '<?php echo constant('URL').privado."securimage/"; ?>securimage_show.php?' + Math.random(); captcha_image_audioObj.refresh(); this.blur(); return false">

                                <img height="32" width="32" src="<?php echo constant('URL').privado."securimage/"; ?>images/refresh.png" alt="Refresh Image" onclick="this.blur()" style="border: 0px; " />
                            </a>
                                <input type="text" name="captcha" id="captcha_code" class="form-control " placeholder="Codigo de Seguridad" style="width: 80%;margin-top: 5px;" >
                                <span style="color: red;" id="texto">
                                  <?php echo $this->mensaje; ?>
                                </span>
                                
                        </div>
  

                            <script type="text/javascript" src="<?php echo constant('URL').privado."securimage/"; ?>securimage.js"></script>
                            <script type="text/javascript">
                                captcha_image_audioObj = new SecurimageAudio({ audioElement: 'captcha_image_audio', controlsElement: 'captcha_image_audio_controls' });
                            </script>

                            <div style="clear: both"></div>
                        </div>
                  
                            <div class="form-group text-center m-t-20">
                                <div class="col-xs-12">

                                <input type="button" class="btn  btn-success m-r-10" name="guardar" id="guardar" value="Entrar">

                                <input type="button" class="btn btn-danger" id="limpiar" name="limpiar" value="Limpiar">

                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>

    </div>

    </div>

<!-- ============================================================== -->
<!-- Final contenido de pagina -->
<!-- ============================================================== -->
       <!-- footer -->
<!-- ============================================================== -->
    <footer class="footer" style="margin-left: -7%;">
        <a href="<?php echo X ?>" style="margin-left: 25px;">&copy;</a> 2020-2021 Sistema de Organizacion Docente
    </footer>
<!-- ============================================================== -->
<!-- final footer -->
<!-- ============================================================== -->

</div>
       <?php include (call."Script.php"); ?>
    </body>
</html>
