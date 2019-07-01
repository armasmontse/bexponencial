<template>
    <div class="account-info bg-gray">
        <div class="account__container">

            <simple-loader v-show="loader"></simple-loader>

            <div class="account__card" v-show="showMethods">
                <!-- mostramos los cards cuando existan -->
                <div class="account__content">
                    <h3 class="account__title">Métodos de pago registrados</h3>
                    <div style = "background-color: #5D539E; padding:20px;" v-for="card in customer.cards">

                        <div style="font-size:16px; color:white;">
                            Titular de la tarjeta: {{ card.name }}
                        </div>
                        <div style="font-size:16px; color:white;">
                            Tarjeta: ...{{ card.last4 }}
                        </div>
                        <div style="font-size:16px; color:white;">
                            Tipo de tarjeta: {{ card.brand }}
                        </div>
                        <div style="font-size:16px; color:white;" v-if="card.default">
                            Tarjeta seleccionada para los cobros automáticos
                        </div>
                        <button v-else class="account__form-btn margTop" type="button" @click="changeCard(card.id)" >
                            Cambiar cobros a esta tarjeta
                        </button>

                        <!--<button class="account__form-btn margTop" type="button" @click="testOrder" >
                            Hacer un pago de prueba
                        </button>-->
                    </div>
                </div>
                <button class="account__form-btn margTop"
                    type="button"
                    @click="addCard = true" >
                    Agregar nuevo método de pago
                </button>
            </div>

            <div class="account__card" v-show="addCard">

                <div class="account__content">

                    <h3 class="account__title">Agregar método de pago</h3>
                    <form class="grid__col-1-2 auth__form form"
                        role="form"
                        method="POST"
                        action=""
                        id="card-form">

                        <input type="hidden" name="_token" :value="csrf">

                        <span class="card-errors"
                            style="color:red; font-size:16px;"
                            v-show="errors!=''">
                            {{ errors }}
                        </span>

                        <div class="account__form">
                            <label class="account__label auth__form--titleInput">
                                Nombre del tarjetahabiente
                            </label>
                            <input type="input"
                                class="account__form-input auth__form--input form--input"
                                data-conekta="card[name]"
                                required>
                        </div>
                        <div class="account__form">
                            <label class="account__label auth__form--titleInput">
                                Número de tarjeta
                            </label>
                            <input type="input"
                                class="account__form-input auth__form--input form--input"
                                data-conekta="card[number]"
                                required>
                        </div>

                        <div class="account__form">
                            <label class="account__label auth__form--titleInput">
                                CVC
                            </label>
                            <input type="input"
                                class="account__form-input auth__form--input form--input"
                                data-conekta="card[cvc]"
                                required>
                            <label class="account__label-small" for="">3 caracteres.</label>
                        </div>

                        <div class="account__form">
                            <label class="account__label auth__form--titleInput">Fecha de expiración (Mes)</label>
                            <input class="account__form-input"
                                type="input"
                                data-conekta="card[exp_month]"
                                required>
                        </div>
                        <div class="account__form">
                            <label class="account__label auth__form--titleInput">Fecha de expiración (Año)</label>
                            <input class="account__form-input"
                                type="input"
                                data-conekta="card[exp_year]" required>
                        </div>
                        <div class="account__form">
                            <label class="account__label auth__form--titleInput">Plan</label>
                            <select v-model="planSelected" class="account__form-input">
                                <option v-for="plan in plans" :value="plan.id">{{ plan.plan_name }}</option>
                            </select>
                            <label class="account__label-small" for="">Plan al que se asignará la suscripción.</label>
                        </div>
                        <button class="account__form-btn margTop"
                            type="button"
                            @click="savePaymentMethod" >
                            Probar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!--<form-error v-show="!errors.length"  :errors="errors"></form-error>-->
    </div>
</template>
<script>

    //import $ from 'jquery';
    export default {
        data: function () {
            return {
                plans: [],
                errors: [],
                customer: {
                    info: null,
                    cards: null,
                    school: null,
                },
                planSelected: null,
                loader: false,
                addCard: false,
                showMethods: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        mounted() {
            let app = this;

            //Mostramos el loader
            app.loader = true;

            //Asignamos el public key
            Conekta.setPublicKey('key_PGgGgcrzopXkg4Qz32WEwQw');

            //Obtenemos el método de pago si es que el usuario tiene
            axios
                .get('../api/getCreditCards')
                .then(function (resp){
                    app.plans = resp.data.plans;
                    app.school = resp.data.school;
                    app.customer.info = resp.data.custumer;
                    app.planSelected = resp.data.planSelected.id;
                    app.loader = false;

                    //Si customer está vacío, mostramos el form
                    if(resp.data.customer == false){
                        app.addCard = true;

                    }else{
                        app.customer.cards = resp.data.cards.data;

                        if(app.customer.cards == null){
                            app.addCard = true;
                        }else{
                            app.showMethods = true;
                        }

                    }
                    //alert('Tu respuesta se ha guardado de manera exitosa');
                })
                .catch(function (error){
                    console.log(error);
                    alert('Ocurrió algun error, Inténtalo de nuevo');
                    app.errors = error.response.data.errors;
                });
        },
        methods: {
            savePaymentMethod() {
                let app = this;

                app.addCard = false;
                app.loader = true;
                app.showMethods = false;

                //Mostramos el loader
                var conektaSuccessResponseHandler = function(token) {

                    app.errors = [];

                    //Creamos un formData
                    var data = new FormData();

                    //Añadimos al objeto formData todos los elementos que
                    //queremos que lleve el post
                    data.append('conektaTokenId', token.id);

                    //Añadimos el método POST dentro del formData
                    data.append('_method', 'POST');

                    //lo mandamos con axios
                    axios
                        .post('../api/savePaymentMethod', data)
                        .then(function (resp){
                            app.customer.info = resp.data.custumer;
                            app.customer.cards = resp.data.cards.data;

                            if(app.customer.cards != null){
                                app.showMethods = true;
                            }

                            app.loader = false;
                            alert('Tu respuesta se ha guardado de manera exitosa');
                        })
                        .catch(function (error){
                            alert('Ocurrió algun error, Inténtalo de nuevo');
                            app.errors = error.response.data.errors.message_to_purchaser;
                        });
                };

                //Para colocar los mensajes de error
                var conektaErrorResponseHandler = function(response) {
                    var form = document.getElementById('card-form');
                    app.errors = response.message_to_purchaser;
                    app.loader = false;
                };

                var form = document.getElementById('card-form');

                Conekta.Token.create(form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
            },
            changeCard(card){
                let app = this;

                //Creamos un formData
                var data = new FormData();

                data.append('card', card);

                //lo mandamos con axios
                axios
                    .post('../api/changeDefaultCard', data)
                    .then(function (resp){
                        app.customer.cards = resp.data.cards.data;
                        alert('Tu respuesta se ha guardado de manera exitosa');
                    })
                    .catch(function (error){
                        alert('Ocurrió algun error, Inténtalo de nuevo');
                        //app.errors = error.response.data.errors.message_to_purchaser;
                    });
            },
            /*testOrder(card){
                let app = this;

                //Creamos un formData
                var data = new FormData();

                data.append('card', card);

                //lo mandamos con axios
                axios
                    .post('../api/createOrder', data)
                    .then(function (resp){
                        //app.customer.cards = resp.data.cards.data;
                        alert('Tu respuesta se ha guardado de manera exitosa');
                    })
                    .catch(function (error){
                        alert('Ocurrió algun error, Inténtalo de nuevo');
                        //app.errors = error.response.data.errors.message_to_purchaser;
                    });
            }*/

        }
    }
</script>
