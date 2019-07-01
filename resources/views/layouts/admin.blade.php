<!DOCTYPE html>
<html lang="es">
	@include('layouts.includes.admin.head')

	<body class="admin">

		{{-- @include('general._alerts')--}}

		<div id="admin-vue"  class="row">
			@include('layouts.includes.admin._sidebar')

			<div class="main">
				@include('layouts.includes.admin._header')

				<section class="row content">
					@yield('content')
				</section>

				@include('layouts.includes.admin._footer')

			</div>

		</div>
        @include('layouts.includes.admin.scripts')
	{{--@yield('modals')



		@yield('vue_templates')--}}

	</body>

</html>
