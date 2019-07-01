<template>
    <div class="faq-info contact bg-white">

        <div class="faq__container">
            <div class="faq__card big">
                <div class="faq__content">
                    <h3 class="faq__title">Legales:</h3>
                    <div class="faq__text">
                        <div class="flex-columns-start legales">
                            <a href="#">Aviso de privacidad</a>
                            <a href="#">Términos y condiciones</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="faq__card small">
                <div class="faq__content">
                    <h3 class="faq__title">Agenda una visita en nuestras oficinas:</h3>
                    <div class="faq__text">
                        <a href="#">
                            <div class="flex phone">
                                <img :src="'../images/images-news/oficina.svg'" alt="">
                                <div class="flex-columns-start">
                                    <p>Plaza Río Grijalba núm 5. Cuauhtémoc, 028289, CDMX.</p>
                                    <p>Horario de atención: 9-18hrs.</p>
                                    <p>Citas: 55 6389 7389</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="faq__container">

            <div class="faq__card big">
                <div class="faq__content">
                    <h3 class="faq__title">Conoce nuestra página de ventas:</h3>
                    <div class="faq__text">
                        <a href="#">
                            <div class="flex phone">
                                <img :src="'../images/images-news/pagina-web.svg'" alt="">
                                <p>bexponencial.com</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="faq__card small">
                <div class="faq__content">
                    <h3 class="faq__title">Contacto:</h3>
                    <div class="faq__text">
                        <a href="#">
                            <div class="flex phone">
                                <img :src="'../images/notificatios.svg'" alt="">
                                <p>(52) 55 7290 7289</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="flex phone">
                                <img :src="'../images/notificatios.svg'" alt="">
                                <p>(52) 55 7290 7289</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="flex phone">
                                <img :src="'../images/notificatios.svg'" alt="">
                                <p>(52) 55 7290 7289</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="flex chat">
                                <img :src="'../images/images-news/email.svg'" alt="">
                                <p>hola@bexonencial.com</p>
                            </div>
                        </a>
                        <div class="social">
                            <a href="#">
                                <img class="icon" :src="'../images/FB.svg'" alt="" />
                            </a>
                            <a href="#">
                                <img class="icon" :src="'../images/twitter.svg'" alt="" />
                            </a>
                            <a href="#">
                                <img class="icon" :src="'../images/instagram.svg'" alt="" />
                            </a>
                            <a href="#">
                                <img class="icon" :src="'../images/youtube.svg'" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    export default {
        mounted() {
            let app = this;
            axios.get('../api/faq')
                .then(function (resp) {
                    app.faqs=resp.data;

                })
                .catch(function (data) {
                    console.log(data);
                });

        },
        data: function () {
            return {
                faqs: {},
            }
        },
        methods: {
            isSelected() {
                if(notifications.notificationsList.id.length){
                    return true;
                }else{
                    return false;
                }
            }
        }
    }
    </script>
