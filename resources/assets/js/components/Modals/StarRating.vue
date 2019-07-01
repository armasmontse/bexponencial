<template>
<div class="star-rating">
    <div class="star__score">
        <p>Calificación</p>
        <label class="star-rating__star" v-for="rating in ratings" :class="{'is-selected': ((value >= rating) && value != null), 'is-hover': ((value_t >= rating) && value_t != null), 'is-disabled': disabled}" v-on:click="set(rating)">

            <input class="star-rating star-rating__checkbox" type="radio" :value="rating" name="checkbox-rating" v-model="value" :disabled="disabled">☆
        </label>
        <p class="strike">Inapropiado</p>
        <label class="strike-rating__star is-selected">
            <input type="radio" class="star-rating strike-rating__checkbox" :disabled="disabled" name="strike_checkbox" />□
        </label>
    </div>
    <br/>

<br/>





    <button @click="setRating(id)" class="star__btn" type="button">
        Puntuar respuesta
    </button>
</div>
</template>
<script>
export default {
    props: ['name', 'value', 'value_t', 'id', 'disabled', 'required'], //Indica que la variable llega de otro componente vue
    data: function() {
        return {
            strike: 0,
            temp_value: null,
            ratings: [1, 2, 3, 4, 5]
        }
    },
    methods: {
        /*
         * Set the rating of the score
         */
        set: function(value) {
            let app = this;

            if (!app.disabled) {
                // Make some call to a Laravel API using Vue.Resource
                app.temp_value = value;
                return app.value = value;
            }
        },
        /*
         * Mandamos la puntuación
         */
        setRating(answer) {
            let app = this;
            //Creamos un formData
            var data = new FormData();

            data.append('user', bexpo.user);
            data.append('answer_id', answer);
            data.append('score', app.value);
            data.append('strike', app.strike)
            data.append('_method', 'POST');

            axios
                .post('../api/ratingAnswer', data)
                .then(function(resp) {
                    alert('Tu respuesta se ha guardado de manera exitosa');
                })
                .catch(function(error) {
                    alert('Ocurrió algun error, Inténtalo de nuevo');
                    app.errors = error.response.data.errors;
                });
        }
    }
}
</script>
