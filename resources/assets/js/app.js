require('./bootstrap');
//require('./conekta');
window.$ = require('jquery');
import ScrollMagic from 'scrollmagic/scrollmagic/uncompressed/ScrollMagic';
import 'scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';
import 'scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators';
import 'gsap/src/uncompressed/plugins/ScrollToPlugin';
import ImageMap from './scrollVillage.js';
import TweenMax from 'gsap/src/uncompressed/TweenMax';
import TimelineMax from 'gsap/src/uncompressed/TimelineMax';
import Knob from 'jquery-knob/dist/jquery.knob.min.js';
import Slick from 'slick-carousel/slick/slick.min.js';

import VueRouter from 'vue-router';
import Flash from './components/Forms/Flash.vue';
import ChallengeModal from './components/Modals/Challenge.vue';
import Svg_Component from './components/Svg/svg-component.vue';
import Timeline from './components/Users/Students/Status/Timeline.vue';
import Village from './components/Users/Students/Map/Village.vue';
import Accordion from './components/Users/Accordion.vue';
import RatingModal from './components/Modals/Rating.vue';
import RatingComponent from './components/Modals/StarRating.vue';
import CompleteMissionModal from './components/Modals/CompleteMissionModal.vue';
import IntroModal from './components/Modals/IntroModal.vue';
import Loader from './components/loader.vue';
import SimpleLoader from './components/simple-loader.vue';
import Vuetify from 'vuetify';
window.Vue = require('vue');
window.Vue.use(VueRouter);
window.Vue.use(Vuetify)
import BeHome from './components/Users/Students/BeHome.vue';
import PersonalInfo from './components/Users/Students/Profile/PersonalInfo.vue';
import ConfigSettings from './components/Users/Students/Profile/ConfigSettings.vue';
import FAQ from './components/Users/Students/Profile/Faq.vue';
import Contact from './components/Users/Students/Profile/Contact.vue';
import Drive from './components/Users/Students/Drive.vue';
import DriveSingle from './components/Users/Students/Drive-single.vue';
import PaymentMethods from './components/Users/Students/Profile/PaymentMethods.vue';
//import Notifications from './components/Users/Students/Profile/Notifications.vue';
import UserMap from './components/Users/Students/Map/UserMap.vue';
import Villages from './components/Users/Students/Map/Villages.vue';
import Missions from './components/Users/Students/Map/Missions.vue';
import GlobalChallenge from './components/Users/Students/Map/GlobalChallenge.vue';
import SecretFile from './components/Users/Students/Map/SecretFile.vue';
import Achievements from './components/Users/Students/Status/Achievements.vue';
import Progress from './components/Users/Students/Status/Progress.vue';
import Ranking from './components/Users/Students/Status/Ranking.vue';
window.Vue.component("flash", Flash);
window.Vue.component("intro-modal", IntroModal);
window.Vue.component("challenge-modal", ChallengeModal);
window.Vue.component("village-view", Village);
window.Vue.component("svg-component", Svg_Component);
window.Vue.component("timeline", Timeline);
window.Vue.component("rating-modal", RatingModal);
window.Vue.component("star-rating", RatingComponent)
window.Vue.component("accordion", Accordion);
window.Vue.component("mission-complete-modal", CompleteMissionModal);
window.Vue.component("loader", Loader);
window.Vue.component("simple-loader", SimpleLoader);
const routes = [{
        path: '/',
        components: {
            beHome: BeHome
        },
        name: 'home',
    },
    {
        path: '/info',
        name: 'info',
        component: PersonalInfo
    },
    {
        path: '/config',
        name: 'config',
        component: ConfigSettings
    },
    {
        path: '/faq',
        name: 'faq',
        component: FAQ
    },
    {
        path: '/mi-mundo',
        name: 'map',
        component: UserMap
    },
    {
        path: '/villages/:id',
        name: 'villages',
        component: Villages
    },
    {
        path: '/mission/:id',
        name: 'mission',
        component: Missions
    },
    {
        path: '/globalChallenge',
        name: 'globalChallenge',
        component: GlobalChallenge
    },
    {
        path: '/achievements',
        name: 'achievements',
        component: Achievements
    },
    {
        path: '/progress',
        name: 'progress',
        component: Progress
    },
    {
        path: '/ranking',
        name: 'ranking',
        component: Ranking
    },
    {
        path: '/secretFile/:id',
        name: 'secretFile',
        component: SecretFile
    },
    {
        path: '/drive',
        name: 'drive',
        component: Drive
    },
    {
        path: '/drive-single/:id',
        name: 'drive-single',
        component: DriveSingle
    },
    {
        path: '/payment',
        name: 'payment-methods',
        component: PaymentMethods
    },
    {
        path: '/contact',
        name: 'contact',
        component: Contact
    },
]
const router = new VueRouter({
    routes
})
var noSidebar= ["info","achievements","progress","ranking","drive","faq","contact","payment-methods"];
router.beforeEach((to, from, next) => {
  next()
});
router.afterEach((to, from, next) => {

    if(noSidebar.indexOf(to.name)!=-1){
        $("#sidebar").hide();
        $(".page-content").css("grid-column","1/3");
        //Footer al 100% cuando no hay Sidebar
        $(".footer").addClass('footer__full');
        $(".footer__container").css("grid-column","1/4");
        
        
    }else{
        $("#sidebar").show();
        $(".page-content").css("grid-column","2/3");
        //Footer normal cuando hay Sidebar
        $(".footer").removeClass('footer__full');
        $(".footer__container").css("grid-column","2/4");
    }
    if(to.name=="villages"){
    $(function() { // wait for document ready
        // init controller
        //

        $("#loader").fadeOut(3000);

        $('#myKnob').knob(
            {
                'displayPrevious': 'true',
                'inputColor': ' #FFFFFF ',
                'bgColor': ' #FFC31D ',
                'fgColor': ' #FFC31D '
            }
        );
        $('#myKnob').trigger(
            'configure', {
                "fgColor": "#FFC31D",

            });



        var controller = new ScrollMagic.Controller({
            container: "#village",
            vertical: false
        });
        controller.scrollTo(function(newpos) {
            TweenMax.to("#village", 0.5, {
                scrollTo: {
                    x: newpos
                }
            });
        });
        $(document).on('click','.village-selector',function(){
            var id = $(this).data("scene");
            if ($(id).length > 0) {
                controller.scrollTo(id);
            }
        });

        // agregar metodo on click para circulos del mapa
        //    $('img[usemap]').imageMap();

        ///nota mental: setear tweens de nuves, barcos y molinos sin anexarlos a la escena
        var tween = new TimelineMax();
        tween.fromTo("#nubes", 1800, {
            right: "-88%"
        }, {
            right: "500%",
            repeat: -1,
            yoyo: false,
            ease: Linear.easeInOut
        });
        tween.fromTo("#nubes1", 1800, {
            left: "200%"
        }, {
            left: "400%",
            repeat: -1,
            yoyo: false,
            ease: Linear.easeInOut
        }, 0);
        tween.fromTo("#nubes2", 1800, {
            right: "0"
        }, {
            right: "400%",
            repeat: -1,
            yoyo: false,
            ease: Linear.easeInOut
        }, 0);
        tween.fromTo("#nubes3", 1800, {
            left: "-52%"
        }, {
            left: "400%",
            repeat: -1,
            yoyo: false,
            ease: Linear.easeInOut
        }, 0);
        tween.fromTo("#nubes4", 2800, {
            left: "500%"
        }, {
            left: "0%",
            repeat: -1,
            yoyo: false,
            ease: Linear.easeInOut
        }, 0);
        tween.fromTo("#barco1", 300, {
            right: "4000"
        }, {
            right: "6982",
            repeat: -1,
            yoyo: false,
            ease: Linear.easeInOut
        }, 0);
        tween.fromTo("#barco2", 400, {
            right: "5000"
        }, {
            right: "6982",
            repeat: -1,
            yoyo: false,
            ease: Linear.easeInOut
        }, 0);
        tween.fromTo("#barco3", 200, {
            left: "4750"
        }, {
            left: "6982",
            repeat: -1,
            yoyo: false,
            ease: Linear.easeInOut
        }, 0);
        tween.to(".elice-1", 10, {
            rotation: 360,
            ease: Linear.easeNone,
            // yoyo: false,
            repeat: -1,
            // transformOrigin: "left top"
        }, 0);
        tween.to(".elice-2", 20, {
            rotation: 360,
            ease: Linear.easeNone,
            // yoyo: false,
            repeat: -1,
            // transformOrigin: "left top"
        }, 0);
        tween.to(".elice-3", 10, {
            rotation: 360,
            ease: Linear.easeNone,
            // yoyo: false,
            repeat: -1,
            // transformOrigin: "left top"
        }, 0);
        tween.to(".elice-4", 20, {
            rotation: 360,
            ease: Linear.easeNone,
            // yoyo: false,
            repeat: -1,
            // transformOrigin: "left top"
        }, 0);
        tween.to(".elice-5", 10, {
            rotation: 360,
            ease: Linear.easeNone,
            // yoyo: false,
            repeat: -1,
            // transformOrigin: "left top"
        }, 0);
        tween.to(".elice-6", 20, {
            rotation: 360,
            ease: Linear.easeNone,
            // yoyo: false,
            repeat: -1,
            // transformOrigin: "left top"
        }, 0);
        tween.to(".elice-7", 10, {
            rotation: 360,
            ease: Linear.easeNone,
            // yoyo: false,
            repeat: -1,
            // transformOrigin: "left top"
        }, 0);
        tween.to(".elice-8", 20, {
            rotation: 360,
            ease: Linear.easeNone,
            // yoyo: false,
            repeat: -1,
            // transformOrigin: "left top"
        }, 0);
        tween.to(".elice-9", 10, {
            rotation: 360,
            ease: Linear.easeNone,
            // yoyo: false,
            repeat: -1,
            // transformOrigin: "left top"
        }, 0);
        tween.to(".elice-10", 20, {
            rotation: 360,
            ease: Linear.easeNone,
            // yoyo: false,
            repeat: -1,
            // transformOrigin: "left top"
        }, 0);
        tween.to(".elice-11", 10, {
            rotation: 360,
            ease: Linear.easeNone,
            // yoyo: false,
            repeat: -1,
            // transformOrigin: "left top"
        }, 0);
        tween.to(".elice-12", 20, {
            rotation: 360,
            ease: Linear.easeNone,
            // yoyo: false,
            repeat: -1,
            // transformOrigin: "left top"
        }, 0);
        tween.to(".elice-13", 10, {
            rotation: 360,
            ease: Linear.easeNone,
            // yoyo: false,
            repeat: -1,
            // transformOrigin: "left top"
        }, 0);
        //var tween = TweenMax.fromTo("#parallax1", 60,{left: "-2500"},{left: "3000", repeat: -1, yoyo: false, ease: Linear.easeInOut});
        // build scene
        /*  var scene = new ScrollMagic.Scene({triggerElement: "#parallaxContainer", duration: 2000, offset: 450})
                        .setTween(tween)
                        .setPin("#parallaxContainer")
                        .addIndicators({name: "timeline"}) // add indicators (requires plugin)
                        .addTo(controller2);*/
    });
}
});

const app = new Vue({
    el: "#vue-container",
    data:function () {
        return {
        }
    },
    router,
    watch:{

    },
    updated: function () {
        this.$nextTick(function () {
            $('#myKnob').knob(
                {
                    'displayPrevious': 'true',
                    'inputColor': ' #FFFFFF ',
                    'bgColor': ' #FFC31D ',
                    'fgColor': ' #FFC31D '
                }
            );
            $('#myKnob').trigger(
                'configure', {
                    "fgColor": "#FFC31D",

                }

            );
            // Code that will run only after the
            // entire view has been re-rendered
        })
    },
});


$(function(){

    //$( "div" ).has( "#reto4" ).addClass( "full" );
    $("#reto4").each(function(){
        console.log('si hay reto 4');
    });


    // H E A D E R   M O B I L E
    var btnAbrir = $("#btn-abrir_JS");
    var btnCerrar = $("#btn-cerrar_JS");


    var menu = $(".navbar-menu-mobile");

    // var open = false;

    btnAbrir.on('click', function () {
        menu.addClass('view');
    });

    btnCerrar.on('click', function () {
        menu.removeClass('view');
    });

    // closeMenu.on('click', function () {
    //     menu.removeClass('view')
    // });




    //Cerrar Submenu Estatus X
    var btnAbrirEstatus = $("#menu-estatus");
    var btnCerrarEstatus = $("#btn-cerrar-estatus_JS");
    var submenuEstatus = $(".submenu.estatus");

    btnAbrirEstatus.on('click', function () {
        submenuEstatus.addClass('view');
    });

    btnCerrarEstatus.on('click', function () {
        submenuEstatus.removeClass('view')
    });

    //Cerrar Submenu Perfil X
    var btnAbrirPerfil = $("#menu-perfil");
    var btnCerrarPerfil = $("#btn-cerrar-perfil_JS");
    var submenuPerfil = $(".submenu.perfil");


    btnAbrirPerfil.on('click', function () {
        submenuPerfil.addClass('view');
    });

    btnCerrarPerfil.on('click', function () {
        submenuPerfil.removeClass('view')
    });

    //Cerrar Submenu Encuentra X
    var btnAbrirEncuentra = $("#menu-encuentra");
    var btnCerrarEncuentra = $("#btn-cerrar-encuentra_JS");
    var submenuEncuentra = $(".submenu.encuentra");


    btnAbrirEncuentra.on('click', function () {
        submenuEncuentra.addClass('view');
    });

    btnCerrarEncuentra.on('click', function () {
        submenuEncuentra.removeClass('view')
    });


    var closeSubmenuStatus = $('.submenu__container ul');
    var closeSubmenuencuentra = $('.navbar-menu-mobile__links .item.link');

    closeSubmenuStatus.on('click', function () {
        submenuEstatus.removeClass('view');
        submenuPerfil.removeClass('view');
        submenuEncuentra.removeClass('view');
        $('.navbar-menu-mobile').removeClass('view');
        console.log('Cerrar submenu y menu');
    });


    /*closeSubmenuPerfil.on('click', function () {
        submenuPerfil.removeClass('view');
        $('.navbar-menu-mobile').removeClass('view');
        console.log('Cerrar submenu y menu');
    });*/

    // closeSubmenuPerfil.on('click', function () {
    //     submenuPerfil.removeClass('view');
    //     $('.navbar-menu-mobile').removeClass('view');
    //     console.log('Cerrar submenu y menu');
    // });


    // M O D A L   A R C H I V O   S E C R E T O
    const close = $(".secretFile__close-JS");
    const item = $(".secretFile__card");

    // Abre un modal en especifico.
    function openModal(index) {

        $('.secretFile__modal').addClass('view');
        $(".slider").slick({
            infinite: false,
            dots: false,
            arrows: true,

        });
        $('.slider').slick('setPosition');
        $('.slider').slick('slickGoTo', index);
    }

    // Cierra todos los modales.
    function closeModal() {
        $('.secretFile__modal').removeClass('view');
        $('.slider').slick('unslick');
    }

    // Event handler para abrir el modal.
    item.click(function () {

        let index = $(this).data('index');
        console.log(this);
        console.log(index);

        openModal(index);
    });

    // Event handler para cerrar el modal
    close.click(function () {
        closeModal();
    });




    // M O D A L   H E L P
    var btnAbrirModalHelp = $(".missions__help-JS");
    var btnCerrarModalHelp = $(".closeModalHelp");
    var ModalHelp = $(".modal-help__container");

    btnAbrirModalHelp.on('click', function () {
        ModalHelp.addClass('view');
    });

    btnCerrarModalHelp.on('click', function () {
        ModalHelp.removeClass('view');
    });


})
