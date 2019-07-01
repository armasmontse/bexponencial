<script>
var mainVueStore = {
    ajaxData: function(routes_obj) {
{{--/**
     * Predefine los campos necesarios para hacer un llamado get, y permite guardar otras rutas útiles para ajax.
     *
     * El objeto routes_obj debe verse de este modo:
     * 			 { get: '{{route('client::shop.ajax.index')}}'}
     * Esto permite introducir una ruta get cuya petición se hará automáticamente en el momento se crea la instancia del mainVue.
     * @param  {[type]} routes_obj 	debe determinar campos como get, post, etc. cuyo valor es una URL
     * @return {Object} 			Dos propiedades. La más importante es "data" el cual preinicializa dicho campo para recibir el resultado del get y funcionar reactivamente. El otro es el objeto de rutas que se le ha pasado a la función.
     */--}}
        return {
            data: undefined,
            routes: routes_obj
        }
    },
    {{--/*
    //route i.e.{{route('client::shop.ajax.index')}}
    */--}}
    get: function(route) {
        return this.ajaxData({get: route})
    },






};


 {{--
mainVueStore.bag_key = '{!! $bag_key !!}';
mainVueStore.bag = {!! $bag !!};
mainVueStore.currency = '{!! $currency !!}';
mainVueStore.exchange_rate = {!! $exchange_rate !!};
mainVueStore.iva = 16;
  --}}
</script>
@yield('vue_store')
<script src="{{ asset('js/admin-app.js') }}" defer></script>
@yield('section_script')
