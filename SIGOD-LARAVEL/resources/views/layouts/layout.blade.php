
<html lang="es">
<head>	
		<title>CRUD LARAVEL</title>
		<meta charset="utf-8">
        <meta name="author" content="Josseth Arroyo" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="Description" content="Sistema de Informacion" />
        <meta name="distribution" content="global"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
        <meta http-equiv="Content-Language" content="es"/>


		<link rel="shortcut icon" type="imagen/x-icon" href="{{ asset('assets/img/web/uptaeb.jpg') }}">

		<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('asset/scss/config.css') }}" rel="stylesheet">

        <link href="{{ asset('assets/plugins/bootstrap-rtl-master/dist/css/custom-bootstrap-rtl.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/bootstrap-switch/bootstrap-switch.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('assets/plugins/wizard/steps.css') }}" rel="stylesheet">

        <!-- chartist CSS -->
        <link href="{{ asset('assets/plugins/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/chartist-js/dist/chartist-init.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/css-chart/css-chart.css') }}" rel="stylesheet">

        <!-- Custom CSS -->

        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/colors/default-dark.css') }}" id="theme" rel="stylesheet">
        <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet">

         <!-- PLUGINS PARA LAS FECHAS -->
        <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Daterange picker plugins css -->
        <link href="{{ asset('assets/plugins/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

        <!-- You can change the theme colors from here -->
        <link href="{{ asset('assets/css/colors/blue.css') }}" id="theme" rel="stylesheet">

        <!-- Page plugins css -->
        <link href="{{ asset('assets/plugins/clockpicker/dist/jquery-clockpicker.min.css') }}" rel="stylesheet">

        <!-- Color picker plugins css -->
        <link href="{{ asset('assets/plugins/jquery-asColorPicker-master/css/asColorPicker.css') }}" rel="stylesheet">

        <!-- Footable CSS -->
        <link href="{{ asset('assets/plugins/footable/css/footable.core.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />

        <!-- switchery CSS -->
        <link href="{{ asset('assets/plugins/switchery/dist/switchery.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />

 <style type="text/css">
.pagination-split li {
    margin-left: 10px;
    display: inline-block;
    float: left
}
.pagination>.active>a,
.pagination>.active>span,
.pagination>.active>a:hover,
.pagination>.active>span:hover,
.pagination>.active>a:focus,
.pagination>.active>span:focus {
    padding: 5px;
    background-color: #009efb;
    border-color: #009efb
}
</style> 

</head> 
<body class="fix-header card-no-border">
	<div class="page-wrapper" style="">
		<div class="container-fluid" style="">  
			<div id="main-wrapper"> 
				@yield('content')
			</div>
		</div>
	</div>

	<style type="text/css">
	.table {border-top: 2px solid #ccc;}
	</style>

	<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/news/Botones.js') }}"></script>

	<!-- SCRIPT PROPIOS-->
    <script src="{{ asset('assets/js/news/Page.js') }}"></script>
    <script src="{{ asset('assets/js/news/Numeros.js') }}"></script>
    <script src="{{ asset('assets/js/news/Alertas.js') }}"></script>
    <script src="{{ asset('assets/js/news/Botones.js') }}"></script>
    <script src="{{ asset('assets/js/news/Foto.js') }}"></script>
    <script src="{{ asset('assets/js/news/Lista.js') }}"></script>
<!--     <script src="{{ asset('assets/js/news/Titulos.js') }}"></script> -->
    <script src="{{ asset('assets/js/news/Captcha.js') }}"></script>
    <!-- SCRIPTS MONSTER --> 
    
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/plugins/bootstrap/js/tether.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-switch/bootstrap-switch.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>

    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="{{ asset('assets/plugins/chartist-js/dist/chartist.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('assets/plugins/echarts/echarts-all.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('assets/plugins/Chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard2.js') }}"></script>

    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>

    <script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/tether.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    
     <!-- Plugin JavaScript -->
    <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="{{ asset('assets/plugins/clockpicker/dist/jquery-clockpicker.min.js') }}"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="{{ asset('assets/plugins/jquery-asColorPicker-master/libs/jquery-asColor.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js') }}"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="{{ asset('assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- Footable -->
    <script src="{{ asset('assets/plugins/footable/js/footable.all.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript') }}"></script>
    <!--FooTable init-->
    <script src="{{ asset('assets/js/footable-init.js') }}"></script>
    <!-- Sweetalert-->
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>

    <!--Custom JavaScript -->
    <script src="{{ asset('assets/plugins/wizard/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/wizard/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/wizard/steps.js') }}"></script>

    <script src="{{ asset('assets/js/news/Page.js') }}"></script>

</body>
</html>
