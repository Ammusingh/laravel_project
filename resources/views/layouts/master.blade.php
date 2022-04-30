<!DOCTYPE html>
<html>
<head>
  <title>Laravel Project</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">
  
  <link rel="shortcut icon" href="{{ url('new-favicon-icon.png') }}">

  <!-- plugin css -->
  <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"  />

  <!-- end plugin css -->
  
 <link href="{{ asset('css/mar-pad.css') }}" rel="stylesheet" /> 
 <link href="{{ asset('css/fadish-custom-app.css') }}" rel="stylesheet" /> 
 <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
  @stack('plugin-styles')

  <!-- common css -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  <!-- end common css --> 
	<style> 
		#loader-page {
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			width: 100%;
			background: url(/images/loader.gif) no-repeat center center; 
			z-index: 10000;
		}
	</style>	
  @stack('style')
</head>
<div id="loader-page"></div>
<body data-base-url=""> 
  <script src="{{ asset('assets/js/spinner.js') }}"></script> 
  <div class="main-wrapper" id="app">
    @include('layouts.sidebar')
    <div class="page-wrapper">
      @include('layouts.header')
      <div class="page-content">
        @yield('content')
      </div>
    </div>
  </div>

    <!-- base js -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
	<!-- end base js -->
	
    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- end common js -->

    <!-- Success message js -->
<!--     <script src="{{ asset('js/jquery.bootstrap-growl.js') }}"></script> -->

    <script>
		toastr.options = {
			"closeButton": true,
			"progressBar": true
		}
        $(document).ready(function(){
            $(".alert-success").hide();
             $(".alert-massage").hide();
            setTimeout(function(){ 
                $(".alert-success").fadeOut();
            }, 5000);
        });
    </script>
    
    @if (Session::has('success'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('success') }}");
        </script>
		
    @endif
    @if (Session::has('errors'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{  session('errors')->first()  }}");
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{  session('error')  }}");
        </script>
    @endif
    @if (Session::has('info'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        </script>
    @endif
    @if (Session::has('warning'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        </script>
    @endif 
    <!-- End success message js -->
    @stack('custom-scripts')
	
	
</body>
</html>