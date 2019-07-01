<template>
<div class="missions__questions">
    <transition name="fade" :duration="{ enter: 500, leave: 800 }">
        <flash v-show="success">

            <div slot="body">
                <div v-show="isUpdated" class="message__body">
                    <div class="flash_icon">
                        <div class="item">

                            <p>{{challengeCoins}}</p>
                            <img class="flash_icon" :src="'../images/images-news/monedas.svg'" />
                        </div>

                    </div>
                    <div class="flash_icon">
                        <div class="item">

                            <p>{{challengePoints}}</p>
                            <img class="flash_icon" :src="'../images/images-news/puntos.svg'" />
                        </div>
                    </div>
                </div>

                <h2 class="success">{{message}}</h2>
            </div>



        </flash>
    </transition>
    <transition name="fade" :duration="{ enter: 500, leave: 800 }">
        <flash v-show="showError">
            <h2 class="error" slot="body">Completa los campos de forma correcta.</h2>
        </flash>
    </transition>
    <div class="missions__questions-container">
        <div id="arrow_indicator" class="missions__indicator">
            <span class="missions__indicator-triangle"></span>
        </div>
        <div class="missions__archievents desktop">
            <a href="#">
                <img :src="'../images/images-news/monedas.svg'" alt="">
                <span>+{{ challengeCoins }}</span>
            </a>
            <a href="#">
                <img :src="'../images/images-news/puntos.svg'" alt="">
                <span>+8</span>
            </a>
            <span>15 min</span>
        </div>

        <div class="missions__help">
            <img :src="'../images/help-dona.svg'" alt="">
            <button class="missions__help-JS"
                type="button">
                Ayuda por <span> $9 </span>
            </button>
        </div>

        <div class="missions__content" v-for="(question, index) in questions">

            <form method="post">
                <p class="missions__questions-text" v-html=" question.question"></p>

                <!--<p class="missions__questions-text">{{ question.question }}</p>-->
                <div v-if="checkType(question.question_type.allowed_content, 'text')">
                    <label class="missions__instructions">Escribe tu respuesta</label>
                    <textarea class="missions__answer-textarea aux-class" v-model.trim="answers.answer_text[question.id]"></textarea>

                    <!--El span muestra el error del servidor -->
                    <span class="missions__error">
                        {{ issetProperty('answer_text',errors) ? errors.answer_text[0].toString() : "" }}

                    </span>
                </div>

                <div v-if="checkType(question.question_type.allowed_content, 'jpg,pdf,png,jpeg')">
                    <label class="missions__instructions">comparte tu archivo aquí</label>
                    <div class="missions__addFile">
                        <span class="image">
                            <input id="addFile" name="addFile" class="aux-class" type="file" @change="addFile">
                        </span>

                        <label for="addFile">
                            <img :src="'../images/addFile.svg'" alt="">
                        </label>

                    </div>
                    <div class="missions__ruta-image" style="color:blue">
                        {{ (file_answer=="") ? answers.answer_file[question.id] : file_answer_name }}
                    </div>

                    <!--El span muestra el error del servidor -->
                    <span class="missions__error" v-if="errors.file_answer">
                        {{ errors.file_answer[0] }}
                    </span>
                </div>

                <div v-if="checkType(question.question_type.allowed_content, 'link')">
                    <label class="missions__instructions">Url de respuesta</label>
                    <textarea class="missions__answer-textarea url aux-class" v-model.trim="answers.answer_url[question.id]"></textarea>

                    <!--El span muestra el error del servidor -->
                    <span class="missions__error" v-if="errors.answer_url">
                        {{ errors.answer_url[0] }}
                    </span>
                </div>

                <button class="missions__btn-save" @click="saveAnswer(question.id, question.challenge_id)" type="button">Reto finalizado</button>

            </form>

            <button v-show="missionComplete || showCompleteMissionModal" @click="showRatingModal(question.id)" type="button">
                Calificar respuesta
            </button>
        </div>
    </div>
    <transition name="bounce">
        <mission-complete-modal v-show="showCompleteMissionModal" @closeM="closeMission()" :nextMissionId="nextMissionId" :missionName="missionName">
        </mission-complete-modal>
    </transition>
    <transition name="bounce">
        <rating-modal v-show="openModalRate" @closeR="closeRate()" :randomAnswer="randomAnswer" :relatedQuestion="relatedQuestion">
        </rating-modal>
    </transition>

</div>
</template>

<script>
import $ from 'jquery';
export default {
    props: [
        'questions',
        'answers',
        'missionComplete',
        'challengeCoins',
        'challengePoints',
        'nextChallenge'
    ], //Indica que la variable llega de otro componente vue
    data: function() {
        return {
            file_answer_name:'',
            file_answer: '',
            missionName: null,
            nextMissionId: null,
            openModalRate: false,
            showCompleteMissionModal: false,
            randomAnswer: [],
            relatedQuestion: [],
            errors: [],
            success: false,
            message: "",
            hasStats: false,
            showError: false,
            isUpdated: false,
        }
    },
    updated:function () {

    },
    methods: {
        closeMission() {
            this.showCompleteMissionModal = false;
        },
        closeRate() {
            this.openModalRate = false;
        },
        addFile(event) {
            //Asignamos la imagen a  nuestra data
            this.file_answer_name=event.target.files[0].name;
            this.file_answer = event.target.files[0];
        },
        checkType(allowed, type) {
            var typeArray = type.split(",");
            var isAllowed = false;
            typeArray.forEach(function(element) {
                if(allowed.includes(element)) isAllowed=true;
            });
            return isAllowed;
        },
        /*
            Función para guardar una respuesta
        */
        saveAnswer(question, challenge) {
            let app = this;

            app.errors = [];

            //Creamos un formData
            var data = new FormData();

            //Añadimos al objeto formData todos los elementos que
            //queremos que lleve el post
            data.append('user', bexpo.user);
            data.append('questionId', question);
            data.append('challengeId', challenge);

            if (app.file_answer !== '') {
                data.append('file_answer', app.file_answer);
            }

            if (app.answers.answer_text[question] !== '') {
                data.append('answer_text', app.answers.answer_text[question]);
            }

            if (app.answers.answer_url[question] !== '') {
                data.append('answer_url', app.answers.answer_url[question]);
            }

            //Añadimos el método POST dentro del formData
            data.append('_method', 'POST');

            //Enviamos la petición
            axios
                .post('../api/answer', data)
                .then(function(resp) {
                    console.log(resp);
                    if (resp.data.showCompleteMissionModal) {
                        document.getElementById("userCoins").innerHTML = resp.data.coins;
                        document.getElementById("userExpPoints").innerHTML = resp.data.points;
                        app.showCompleteMissionModal = true;
                        app.missionName = resp.data.missionName;
                        app.nextMissionId = resp.data.nextMissionId;
                        document.getElementById("reto" + (app.nextChallenge - 1)).classList.add("completed");
                    } else {
                        if ('success' in resp.data) {
                            app.message = resp.data.success
                            document.getElementById("userCoins").innerHTML = resp.data.coins;
                            document.getElementById("userExpPoints").innerHTML = resp.data.points;
                            if (resp.data.challengeCompleted) {
                                app.message = "El reto ha sido completado y tu información fue guardada exitosamente."
                                document.getElementById("reto" + app.nextChallenge).classList.remove("disabled");

                                document.getElementById("reto" + (app.nextChallenge - 1)).classList.add("completed");
                            }
                            if (resp.data.updated && resp.data.challengeCompleted) {
                                app.isUpdated = true;
                            } else {
                                app.isUpdated = false;
                            }

                            app.success = true;
                            setTimeout(() => {
                                app.success = false;
                            }, 2000);

                        } else {
                            app.errors = resp.data.errors;

                            app.showError = true;
                            setTimeout(() => {
                                app.showError = false;
                            }, 2000);
                        }
                    }

                })
                .catch(function(error) {
                    console.log(error);
                    //app.errors = rep.data.errors;
                });
        },
        /*
            Mostramos el modal para calificar
        */
        showRatingModal(question) {
            var app = this;
            axios
                .get('../api/getRandomAnswer/' + question)
                .then(function(resp) {
                    app.openModalRate = true;
                    app.randomAnswer = resp.data.answer;
                    app.relatedQuestion = resp.data.relatedQuestion;
                })
                .catch(function(data) {
                    alert(data);
                    app.openModalRate = false;
                });
        },
        issetProperty(prop, obj) {

            if (prop in obj) {
                return true;
            } else {
                return false;
            }

        },
    }
}
</script>
