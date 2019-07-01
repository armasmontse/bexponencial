<template>
    <div class="faq-info bg-white">

        <div class="faq__container">
            <div class="faq__card questions">

                <div class="faq__content">
                    <h3 class="faq__title">preguntas frecuentes</h3>

                    <accordion :isAccesible="true">
                        <div class="flex" slot="header">
                            <svg class="faq" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 22">
                                <defs></defs>
                                <title>faqs0</title>
                                <g id="Capa_2" data-name="Capa 2">
                                    <g id="Layer_1" data-name="Layer 1">
                                        <ellipse class="cls-1" cx="12" cy="9.02" rx="11.5" ry="6.22"/>
                                        <circle class="cls-1" cx="12" cy="9.02" r="0.5"/>
                                        <circle class="cls-1" cx="12" cy="9.02" r="3.5"/>
                                        <path class="cls-1" d="M9.78,15v1.08a2.68,2.68,0,0,1-2.7,2.42H6A3.39,3.39,0,0,0,2.64,22"/>
                                        <path class="cls-1" d="M14.78,15v1.08a2.2,2.2,0,0,0,2.14,2.42H18A3.63,3.63,0,0,1,21.64,22"/>
                                        <path class="cls-2" d="M1.78,6V4A3.28,3.28,0,0,1,5,.5H6.28"/>
                                        <path class="cls-2" d="M22.78,6V4A3.32,3.32,0,0,0,19.5.5H18.28"/>
                                    </g>
                                </g>
                            </svg>
                            <h4 class="accordion__question">¿Consectetuer adipiscing elit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie?</h4>
                        </div>

                        <div class="accordion__answer">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros
                            et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                            <div class="accordion__answer-info">
                                <p>¿La información te resultó útil?</p>
                                <div class="flex">
                                    <a href="#">Si</a>
                                    <a href="#">No</a>
                                </div>
                            </div>
                        </div>
                    </accordion>

                </div>
            </div>

            <div class="faq__card invitatios">

                <div class="faq__content">
                    <h3 class="faq__title">Te ayudamos</h3>
                    <div class="faq__text">
                        <p>Si tienes cualquier duda o dificultad te recomendamos visitar las <a href="#">Preguntas frecuentes.</a>
                        <p>En caso de no encontrar una solución ponte en contacto con nostros:</p></p>
                        <a href="#">
                            <div class="flex phone">
                                <img :src="'../images/notificatios.svg'" alt="">
                                <p>(52) 55 7290 7289</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="flex chat">
                                <img :src="'../images/chat.svg'" alt="">
                                <p>iniciemos un chat</p>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>



    <div v-for="faq in faqs" >
        <h2>{{faq.question}}</h2>
        <p>{{faq.answer}}</p>
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
