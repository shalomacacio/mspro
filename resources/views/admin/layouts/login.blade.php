<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('admin.layouts.partials.head')

<body class="app app-login p-0"> 

    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
                {{-- SECTION CONTENT --}}
				@yield('content')
                {{-- SECTION CONTENT --}}
			    <footer class="app-auth-footer">
				    <div class="container text-center py-3">
				         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
			            <small class="copyright">Developed by <i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="https://caffeinne.com.br" target="_blank">Caffeine - Sistemas</a> for developers</small>
				    </div>
			    </footer><!--//app-auth-footer-->	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
		
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				    <div class="overlay-content p-3 p-lg-4 rounded">
					    <h5 class="mb-3 overlay-title">Vacinação Covid-19</h5>
					    <div>O Planejamento da vacinação contra a Covid-19 já começou. A Prefeitura de Maranguape está pronta com profissionais de sáude, equipamentos, seringas, estrutura e logistica.</a>.</div>
				    </div>
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->

    <script src="{{ asset('portal/assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('portal/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Page Specific JS -->
    <script src="{{ asset('portal/assets/js/app.js') }}"></script>
</body>
</html> 
