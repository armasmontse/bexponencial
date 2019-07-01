<template>
    <div class="mission">
        <transition name="fade" :duration="{ enter: 500, leave: 800 }">
            <flash v-show="showError">
                <h2 class="error" slot="body">Aún debes completar los retos anteriores.</h2>
            </flash>
        </transition>
        <div class="missions__container">

            <div class="missions__description">
                <div class="missions__buttonClose">
                    <img :src="'../images/images-news/btn-close.svg'" alt="">
                </div>
                <div class="flex-center-between">
                    <h1 class="missions__aldea">{{village}}</h1>
                    <div class="missions__archievents desktop">
                        <a href="#">
                            <img :src="'../images/images-news/monedas.svg'" alt="">
                            <span>44</span>
                        </a>
                        <a href="#">
                            <img :src="'../images/images-news/puntos.svg'" alt="">
                            <span>44</span>
                        </a>
                        <span>60 min</span>
                    </div>
                </div>
                <div class="missions__name">
                    <span><img :src="'../images/images-news/flag-new.svg'" alt=""></span>
                    <h3>Misión</h3>
                </div>
                <h4 class="missions__sbtitle">{{ missionName }}</h4>
                <p class="missions__desc" v-html="missionDesc"></p>

                <div class="missions__archievents mobile">
                    <a href="#">
                        <img :src="'../images/images-news/monedas.svg'" alt="">
                        <span>+8</span>
                    </a>
                    <a href="#">
                        <img :src="'../images/images-news/puntos.svg'" alt="">
                        <span>+8</span>
                    </a>
                    <span>15 min</span>
                </div>

            </div>

            <div class="missions__retos">

                <h4 class="missions__retos-title">Retos:</h4>
                <p class="missions__desc">Esta misión cuenta con {{challengeList.length}} retos. Da clic en el primero y realiza la actividad requerida para desbloquear los siguientes retos y completarla.</p>

                <div class="missions__container-diagram">
                    <div class="">
                        <div :id="'reto'+(index+1)" :class="'missions__diagram missions__diagram-reto' + (index + 1) + disabledChallenge(challenge,index)" data v-for="(challenge, index) in challengeList" >

                                <div class="missions__item" @click="showQuestions(challenge.challengeId, (index+2), $event)">
                                    <!-- <h1 v-if="challenge.challengeQuestionsFinishedCount == challenge.challengeQuestionsCount">
                                    Cumplido
                                    </h1>
                                    <p class="title">
                                        {{ 'Monedas ' + challenge.challengeCoins }}
                                    </p>
                                    <br>
                                    <p class="title">
                                        {{ 'Experincia ' + challenge.challengeExp }}
                                    </p>
                                    <br> -->
                                    <p class="title">
                                        <!-- {{ challenge.challengeName }} -->
                                        <strong>Reto {{ index + 1 }}</strong><br/>
                                        {{challenge.challengeName}}
                                    </p>
                                </div>
                                <!-- {{
                                    challenge.challengeQuestionsFinishedCount
                                    + ' preguntas resspondidas de ' +
                                    challenge.challengeQuestionsCount
                                }} -->

                        </div>
                        <svg-component ></svg-component>
                    </div>

                </div>

            </div>
        </div>
        <!--<svg-component ></svg-component>-->
        <challenge-modal
            v-show = 'questions!=null'
            :challengePoints = 'challengePoints'
            :challengeCoins = 'challengeCoins'
            :questions = 'questions'
            :missionComplete = 'missionComplete'
            :nextChallenge = 'nextChallenge'
            :answers = "answers">
        </challenge-modal>


        <div class="modal-help__container">
            <div class="modal-help__row">

                <div class="icon__help">
                    <p>ayuda</p>
                </div>

                <h5 class="modal-help__line">
                    PREGUNTAS detonadoras
                </h5>
                <div class="modal-help__border">
                    <div class="modal-help__content" v-for="n in 2">

                        <div class="col-1-3">
                            <h3>¿Cómo funciona una ciudad sostenible?</h3>
                            <ul>
                                <li>Categorizar y codificar datos recolectados.</li>
                                <li>Crear una tabla para clasificar las similitudes y diferencias entre lo que obtuve en las entrevistas y los hallazgos previos.</li>
                                <li>Elaborar conclusiones (reporte).</li>
                            </ul>
                        </div>
                        <div class="col-1-3">
                            <h3>¿Para qué sirve una ciudad sostenible?</h3>
                            <ul>
                                <li>Categorizar y codificar datos recolectados.</li>
                                <li>Crear una tabla para clasificar las similitudes y diferencias entre lo que obtuve en las entrevistas y los hallazgos previos.</li>
                                <li>Elaborar conclusiones (reporte).</li>
                            </ul>
                        </div>
                        <div class="col-1-3">
                            <h3>¿Qué es una ciudad sostenible?</h3>
                            <ul>
                                <li>Categorizar y codificar datos recolectados.</li>
                                <li>Crear una tabla para clasificar las similitudes y diferencias entre lo que obtuve en las entrevistas y los hallazgos previos.</li>
                                <li>Elaborar conclusiones (reporte).</li>
                            </ul>
                        </div>



                    </div>
                    <div class="modal-help__btn">
                        <button class="closeModalHelp">ok</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script>

    export default {
        data: function () {
            return {
                village: "",
                missionId: null,
                missionName:null,
                missionDesc:null,
                challengeList: [],
                challengeNo: null,
                challengePoints: null,
                challengeCoins: null,
                questions: null,
                missionComplete: null,
                nextChallenge: "",
                showError: false,
                answers: [],
            }
        },

        mounted() {
            let app = this;

            app.missionId = this.$route.params.id;

            axios
                .get('../api/challenges/' + app.missionId)
                .then(function (resp){
                    app.village = resp.data.village;
                    app.missionName = resp.data.missionLabel;
                    app.missionDesc = resp.data.missionDesc;
                    app.challengeList = resp.data.challenges;
                    app.missionComplete = resp.data.missionComplete;

                })
                .catch(function (data){


                });

        },
        methods: {
            showQuestions(challengeId, next, elm) {
                var app = this;
                if(!elm.target.parentNode.classList.contains("disabled")){

                var rect = elm.target.parentNode.offsetLeft+30;

                document.getElementById("arrow_indicator").style.left = rect+"px";

                //traemos las preguntas
                axios
                    .get('../api/questions/' + challengeId)
                    .then(function (resp){
                        app.questions = resp.data.questions;
                        app.answers = resp.data.answers;
                        app.challengePoints = resp.data.challengePoints;
                        app.challengeCoins = resp.data.challengeCoins;
                        app.nextChallenge = next;
                        console.log(app.questions);
                        $('html,body').animate({
                             scrollTop: $('.missions__container').prop("scrollHeight")
                         }, 'slow');

                    })
                    .catch(function (data){
                        console.log(data);
                    });
                }else{
                    app.showError = true;
                    setTimeout(() => {
                        app.showError = false;
                    }, 2000);
                }
            },
            disabledChallenge(challenge,index){
                if(index==0){
                    if(this.challengeList[index].challengeComplete){
                        return " completed";
                    }else{
                        return "";
                    }
                }else{
                if (this.challengeList[index-1].challengeComplete){
                    if(this.challengeList[index].challengeComplete){
                        return " completed";
                    }else{
                        return "";
                    }

                }else{
                    return " disabled";
                }
            }
            }
        }
    }
    </script>
