<template>
    <div class="root-vue drive-single bg-white">

        <div class="drive__row bg-gradient-yellow">
            <div class="drive__container">
                <!--  P A N T A L L A    #1 -->
                <div class="drive__content">
                    <div class="drive__title">
                        <ul class="drive__title-breadcrumbs">
                            <li>
                                <a href="#"> BE DRIVE</a>
                            </li>
                            <li v-for="(breadcrumb, index) in breadcrumbs">
                                {{ breadcrumb.label }}
                            </li>
                        </ul>
                    </div>

                    <h4 class="drive__sbtitle">{{ missionName }}</h4>
                </div>
            </div>
        </div>

        <div  v-for="challenge in challenges">
            <div  v-for="question in challenge">
                <div class="drive__row bg-white">
                    <div class="drive__container">
                        <div class="drive__content">
                            <div class="drive-single__text" v-html="question.question">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="drive__row bg-yellow">
                    <div class="drive__container">
                        <div class="drive__content">
                            <!--<h3 class="drive-single__sbtitle">introduce tus preguntas aqui</h3>-->
                            <div class="drive-single__text">

                                <div  v-for="(answer, key) in answers[question.challenge_id]">

                                    <div v-if="key == 'answer_text' && editable[question.challenge_id]['answer_text'][question.id]">
                                        <textarea class="missions__answer-textarea aux-class form-element"
                                            style = "display:none"
                                            :id = "'input_answer_text_' + question.id"
                                            v-model.trim="answers[question.challenge_id]['answer_text'][question.id]">
                                        </textarea>

                                        <p class="only-text"
                                            style = "display:block"
                                            :id = "'paragraph_answer_text_' + question.id"
                                            v-html="answers[question.challenge_id]['answer_text'][question.id]">
                                        </p>

                                    </div>

                                    <div v-if="key == 'answer_url' && editable[question.challenge_id]['answer_url'][question.id]">
                                        <textarea class="missions__answer-textarea aux-class form-element"
                                            :id = "'input_answer_url_' + question.id"
                                            style="display:none"
                                            v-model.trim="answers[question.challenge_id]['answer_url'][question.id]">
                                        </textarea>

                                        <p class="only-text"
                                           :id = "'paragraph_answer_url_' + question.id"
                                           style="display:block"
                                           v-html="answers[question.challenge_id]['answer_url'][question.id]">
                                        </p>
                                    </div>
                                    <div v-if="key == 'answer_file' && editable[question.challenge_id]['answer_file'][question.id]">
                                        <h3 class="drive-single__sbtitle">Sube tu archivo PDF o JPG</h3>

                                        <div class="missions__addFile form-element"
                                            :id = "'input_answer_file_' + question.id"
                                            style="display:none">

                                            <span class="image">
                                                <input id="addFile" name="addFile" class="aux-class" type="file"
                                                @change="addFile($event, question.id)">
                                            </span>

                                            <label for="addFile">
                                                <img :src="'../images/addFile.svg'" alt="">
                                            </label>

                                        </div>

                                        <img class="gallery__container--img"
                                            v-if = "imageTemp != null"
                                            :src="imageTemp">
                                            <p v-if = "imageTemp != null">
                                                Archivo nuevo {{ imageTemp.name }}
                                            </p>

                                        <!--<img class="gallery__container--img only-text"
                                            :id = "'paragraph_answer_file_' + question.id"
                                            :src="'https://localhost/bexponencial/' + answers[question.challenge_id][key][question.id]">-->
                                    </div>

                                </div>
                            </div>
                            <div class="drive-single__content-btn">

                                <button class="drive-single__btn btn_cancel"
                                    :id = "'button_cancel_' + question.id"
                                    style = "display: none"
                                    @click="cancelEdit(question.challenge_id, question.id)">
                                    Cancelar
                                </button>

                                <button class="drive-single__btn btn_edit"
                                    :id = "'button_edit_' + question.id"
                                    style = "display: block"
                                    @click="editAnswer(question.challenge_id, question.id)">
                                    Editar respuesta
                                </button>

                                <button class="drive-single__btn btn_save"
                                    :id = "'button_save_' + question.id"
                                    style = "display: none"
                                    @click="saveAnswer(question.challenge_id, question.id)">
                                    Guardar respuesta
                                </button>

                                <button class="drive-single__btn">
                                    Historial de respuestas
                                </button>
                            </div>
                        </div>

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
            file_answer: '',
            breadcrumbs: null,
            missionName: null,
            imageTemp: null,
            answers: [],
            editable: [],
            challenges: [],
            buffer: {
                answer_text: '',
                answer_url: '',
                answer_file: ''
            },
        }
    },
    mounted() {
        let app = this;

        axios
            .get('../api/getDataByMission/' + app.$route.params.id )
            .then(function (resp){
                app.challenges = resp.data.challenges;
                app.answers = resp.data.answers;
                app.breadcrumbs = resp.data.breadcrumbs;
                app.missionName = resp.data.missionName;
                app.editable = resp.data.editable;
            })
            .catch(function (data){
                console.log(data);
                alert('Ocurrió algún problema en mounted');
            });
    },
    methods: {
        editAnswer(challenge, question) {
            let app = this;
            //reseteamos todos los campos
            app.resetElements();

            app.displayButtons('edit', question);

            app.displayFormElements(question);

            if(app.answers[challenge]['answer_text'][question] !== ''){
                 app.buffer.answer_text = app.answers[challenge]['answer_text'][question];
            }

            if(app.answers[challenge]['answer_url'][question] !== ''){
                 app.buffer.answer_url = app.answers[challenge]['answer_url'][question];
            }

            if(app.answers[challenge]['answer_file'][question] !== ''){
                 app.buffer.answer_file = app.answers[challenge]['answer_file'][question];
            }

            console.log(app.buffer);

        },
        resetElements(){
            let app = this;

            var hide = document.getElementsByClassName('form-element');
            var show = document.getElementsByClassName('only-text');
            var buttonsEdit = document.getElementsByClassName('btn_edit');
            var buttonsSave = document.getElementsByClassName('btn_save');
            var buttonsCancel = document.getElementsByClassName('btn_cancel');

            //Elementos a ocultar
            for (var i = 0, max = hide.length; i < max; i++) {
                hide[i].style.display = 'none';
            }

            //Elementos a mostrar
            for (var i = 0, max = show.length; i < max; i++) {
                show[i].style.display = 'block';
            }

            //Botones para resetear a
            for (var i = 0, max = buttonsEdit.length; i < max; i++) {
                buttonsEdit[i].style.display = 'block';
                buttonsSave[i].style.display = 'none';
                buttonsCancel[i].style.display = 'none';
            }

            app.buffer.answer_text = '';
            app.buffer.answer_url = '';
            app.buffer.answer_file = '';

            app.imageTemp = null;

        },
        displayFormElements(id){
            var names = [
                'answer_text',
                'answer_url',
                'answer_file'
            ];

            //Elementos a mostrar
            for (var i = 0, max = names.length; i < max; i++) {
                //Asignamos cada elemento los elementos a una variable
                var formElement = document.getElementById('input_' + names[i] + '_' + id);
                var paragraphElement = document.getElementById('paragraph_' + names[i] + '_' + id);

                //Preguntamos si existe ese elemento en el dom
                if (formElement !== null){
                    formElement.style.display = 'block';
                    paragraphElement.style.display = 'none';
                }
            }
        },
        cancelEdit(challenge, question){
            let app = this;

            //Asignamos lo del buffer al elemento para que lo vuelva a tener
            app.answers[challenge]['answer_text'][question] = app.buffer.answer_text;
            app.answers[challenge]['answer_url'][question] = app.buffer.answer_url;
            app.answers[challenge]['answer_file'][question] = app.buffer.answer_file;

            //Reseteamos todos los elementos
            app.resetElements();
        },
        displayButtons(type, id){
            //definimos los botones
            var cancel = document.getElementById('button_cancel_' + id).style;
            var save = document.getElementById('button_save_' + id).style;
            var edit = document.getElementById('button_edit_' + id).style;

            if(type == 'edit'){
                cancel.display = 'block';
                save.display = 'block';
                edit.display = 'none';
            }
        },
        addFile(event, id) {
            let app = this;
            app.imageTemp = event.target.files[0];

            //Asignamos la imagen a  nuestra data
            app.answers.answer_file[id] = event.target.files[0];
        },
        /* Guardamos con axios*/
        saveAnswer(challenge, question){
            //Llamamos a axios para guardar
            let app = this;

            app.errors = [];

            //Creamos un formData
            var data = new FormData();

            console.log(question);
            console.log(challenge);
            //Añadimos al objeto formData todos los elementos que
            //queremos que lleve el post
            data.append('user', bexpo.user);
            data.append('questionId', question);
            data.append('challengeId', challenge);

            if (app.answers[challenge]['answer_file'][question] !== '') {
                data.append('file_answer', app.answers[challenge]['answer_file'][question]);
            }

            if (app.answers[challenge]['answer_text'][question] !== '') {
                data.append('answer_text', app.answers[challenge]['answer_text'][question]);
            }

            if (app.answers[challenge]['answer_url'][question] !== '') {
                data.append('answer_url', app.answers[challenge]['answer_url'][question]);
            }

            //Añadimos el método POST dentro del formData
            data.append('_method', 'POST');

            //Enviamos la petición
            axios
                .post('../api/answer', data)
                .then(function(resp) {
                    console.log(resp.data);
                    if (resp.data.success) {
                        app.resetElements();
                        alert('Se guardó correctamente');
                    }
                    /*if (resp.data.showCompleteMissionModal) {
                        app.showCompleteMissionModal = true;
                        app.missionName = resp.data.missionName;
                        app.nextMissionId = resp.data.nextMissionId;
                    }
                    if ('success' in resp.data) {
                        app.message = resp.data.success
                        app.success = true;
                        setTimeout(() => {
                            app.success = false;
                        }, 2000);
                        console.log(app.nextChallenge)
                        if(resp.data.challengeCompleted){
                            console.log(app.nextChallenge)
                                document.getElementById("reto"+app.nextChallenge).classList.remove("disabled");
                        }

                    } else {
                        app.errors = resp.data.errors;

                        app.showError = true;
                        setTimeout(() => {
                            app.showError = false;
                        }, 2000);
                    }*/

                })
                .catch(function(error) {
                    app.errors = error.response.data.errors;
                });
        }

        // var navbar = document.getElementById("product-navbar");
        // var navbar_placeholder = document.getElementById("product-navbar-placeholder");
        // var sticky;

        // loadSticky() {
        //     if (navbar.length) {
        //         sticky = navbar.offset().top;
        //     }
        // }

        // posicionarMenu() {
        //     if (navbar.length) {
        //         if (window.pageYOffset >= sticky) {
        //             navbar.addClass("fixed");
        //             navbar_placeholder.show()
        //         } else {
        //             navbar.removeClass("fixed");
        //             navbar_placeholder.hide()
        //         }
        //     }
        // }

    }
}
</script>
