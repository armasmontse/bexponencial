<template>
<div class="star__rating">
    <div class="star__rating-container">
        <div class="rating__content">
            <p class="rating__questions-text" v-html="relatedQuestion.question"></p>

            <div v-if="randomAnswer">
                <div class="rating__answer" v-show="randomAnswer.answer_text!=''">
                    <label class="rating__instructions">Respuesta proporcionada</label>
                    <p class="missions__questions-text" v-html="randomAnswer.answer_text"></p>
                </div>

                <div class="rating__answer" v-show="randomAnswer.answer_file!=''">
                    <label class="rating__instructions">Esquema compartido</label>
                    <div class="missions__ruta-image" style="color:blue">
                        {{ randomAnswer.answer_file + ' ----Ruta de la imagen' }}
                    </div>
                </div>

                <div class="rating__answer" v-show="randomAnswer.answer_url!=''">
                    <label class="rating__instructions">Url sugerida</label>
                    <p class="missions__questions-text" v-html="randomAnswer.answer_url"></p>
                </div>

                <div class="rating__score">

                    <star-rating :value.sync="levelRating" :value_t="1" :id="randomAnswer.id">
                    </star-rating>

                </div>

            </div>
            <div v-else>
                <label class="rating__instructions">No hay respuestas para calificar esta pregunta</label>
            </div>

        </div>
        <div class="close-modal" @click="close()">
            <img :src="'../images/boton-cerrar.svg'" />
        </div>
    </div>

</div>
</template>

<script>
export default {
    props: ['randomAnswer', 'relatedQuestion'], //Indica que la variable llega de otro componente vue
    data: function() {
        return {
            levelRating: 3
        }
    },
    methods: {
        close() {
            console.log("lalala");
            this.$emit('closeR');
        }
    }
}
</script>
