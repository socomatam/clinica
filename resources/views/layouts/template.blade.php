<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Clínica Dalos</title>
</head>

	<!-- STYLESHEETS -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans&display=swap' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
	<link rel="stylesheet" href="{{ asset('/assets/css/template.css',true)}}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	
	<!-- SCRIPTS -->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="{{ asset('/assets/js/redirecciones.js',true)}}"></script>
	<script src="{{ asset('/assets/js/scroll.js',true)}}"></script>
	<script src="{{ asset('/assets/js/search.js',true)}}"></script>
	<script src="{{ asset('/assets/js/clear.js',true)}}"></script>
	<script src="{{ asset('/assets/js/delete.js',true)}}"></script>
	<script src="{{ asset('/assets/js/delete-checkbox.js',true)}}"></script>
	<script src="{{ asset('/assets/js/edit.js',true)}}"></script>
	<script src="{{ asset('/assets/js/show-medicos.js',true)}}"></script>
	<script src="{{ asset('/assets/js/show-pacientes.js',true)}}"></script>
	
<body>

	<div class="wrapper">

		<!-- BANNER -->
		<div class="banner">
			<div class="bg"></div>
			<div class="bg bg2"></div>
			<div class="bg bg3"></div>
			<div class="content-banner">
				<a href="http://clinica-plyrm.run.goorm.io/" style="color: white;">{{trans('template.banner')}}</a>
			</div>
		</div>
		
		<div class="waveWrapper waveAnimation">
			<div class="waveWrapperInner bgTop">
				<div class="wave waveTop" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-top.png')"></div>
			</div>
				<div class="waveWrapperInner bgMiddle">
				<div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')"></div>
			</div>
				<div class="waveWrapperInner bgBottom">
				<div class="wave waveBottom" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')"></div>
			</div>
		</div>
		
			<!-- NAVBAR -->
			<div class="navbar">
				<div class="ui inverted segment" style="border-radius: 0; background-image: linear-gradient(to right, black, #5d49be);">
				  	<div class="ui inverted secondary pointing menu">
				    	<a class="item" href="{{url('/inicio')}}">{{ trans('template.inicio') }}</a>
					    <a class="item" href="{{url('/pacientes')}}">{{ trans('template.paciente') }}</a>
					    <a class="item" href="{{url('/medicos')}}">{{ trans('template.medico') }}</a>
					    <a class="item" href="{{url('/citas')}}">{{ trans('template.cita') }}</a>
						<a class="item" href="{{url('/tratamientos')}}">{{ trans('template.tratamiento') }}</a>
					    <a class="item" href="{{url('/tratamientos_tipos')}}">{{ trans('template.t_tratamiento') }}</a>
						<a class="item" href="{{url('/especialidades')}}">{{ trans('template.especialidad') }}</a>
						<a class="item" href="{{url('/estadisticas')}}">{{ trans('template.estadisticas') }}</a>
						
						<div class="item right">
							
	
							<!-- IDIOMA -->
							<div class="ui dropdown">
								<input class="test" type="hidden">
								<i class="dropdown icon"></i>
								<div class="default text">{{ trans('template.idioma') }}</div>
								<div class="menu">
									<div class="item">
										<a class="dropdown-item" href="{{ url('lang', ['es']) }}" >
											<span style="color: #5d49be;">{{ trans('template.es') }}</span>
										</a>
										<br>
										<br>
										<a class="dropdown-item" href="{{ url('lang', ['en']) }}">
											<span style="color: #5d49be;">{{ trans('template.en') }}</span>
										</a>
									</div>
								</div>
							</div> <!-- Final idioma -->
							
						
								
							<!-- USUARIO -->
							<div class="ui dropdown">
								<input type="hidden">
								<i class="dropdown icon"></i>
								<div class="default text">{{ Auth::user()->name }}</div>
								<div class="menu">
									<div class="item">
										<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
											<span style="color: #5d49be;">{{ __('Logout') }}</span>
										</a>	
										 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>	
									</div>
								</div>
							</div> <!-- Final usuario -->
							
						</div> <!-- Final div contenedor --> 	
						
					</div> <!-- Final menu -->
				</div>
			</div>
		
			<div class="round-circle-right"></div>
			<div class="round-circle-left"></div>
			
			<!-- CONTENT -->
			<div class="content-wrapper">
				@yield('content')
			</div>

			<!-- FOOTER -->
			<div class="footer">
				<div class="ui inverted segment" style="border-radius: 0; background-image: linear-gradient(to right, black, #5d49be); bottom: 0%">
					&copy;{{ trans('template.autores') }} Carlos Satizabal {{ trans('template.y') }} Daniel Merino
				</div>
			</div>
		</div>
	</div>	
	
</body>
	<script> $('.ui.dropdown').dropdown(); </script>
</html>