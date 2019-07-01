<template>
    <div class="account-info bg-gray">
        <div class="account__container">
            <div class="account__card">

                <div class="account__content">
                    <h3 class="account__title">Configuracion</h3>
                    <form class=" grid__col-1-2 auth__form form" role="form" method="POST" action="">
                    <input type="hidden" name="_token" :value="csrf">

                        <div class="account__form">
                            <label class="account__label auth__form--titleInput">contraseña actual</label>
                            <input type="password" class="account__form-input auth__form--input form--input" v-model="user.old_password" required>
                        </div>

                        <div class="account__form">
                            <label class="account__label auth__form--titleInput">Nuevo password</label>
                            <input class="account__form-input" type="password" v-model="user.password" required>
                            <label class="account__label-small" for="">Mínimo 6 caracteres.</label>
                        </div>

                        <div class="account__form">
                            <label class="account__label auth__form--titleInput">Repetir Nuevo password</label>
                            <input class="account__form-input" type="password" v-model="user.password_confirmation" required>
                        </div>

                        <button class="account__form-btn margTop" type="button" @click="updatePassword" >
                            Guardar
                        </button>
                    </form>
                </div>

            </div>
        </div>
        <form-error v-show="!errors.length"  :errors="errors"></form-error>
        <!-- Notificaciones -->
        <!-- <form>
            <div v-for="notification in notifications.notificationsList">
            <input  type="checkbox" name="notifications[]" v-model="checkedNotifications"  :value="notification.id" />
            <span> {{notification.description}} </span>
            </div>
            <div>
                <button type="button" @click="saveUserNotifications" >Guardar</button>
            </div>
        </form> -->
    </div>
</template>
<script>
    export default {
        mounted() {
            let app = this;

            /*axios.get('../api/config/' + bexpo.user)
                .then(function (resp) {

                    app.notifications = resp.data;
                    app.notifications.userNotifications.forEach(function(obj) {
                            app.checkedNotifications.push(obj.id);
                    });

                })
                .catch(function (data) {
                       console.log(data);
                });*/

        },
        data: function () {
            return {
                errors: [],
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                user: {old_password:"",password:"",password_confirmation:""},
                notifications: {},
                checkedNotifications: []
            }
        },
        methods: {

            saveUserNotifications() {
                var app = this;
                var newSet = app.checkedNotifications;
                axios.put('../api/config/' + bexpo.user, newSet)
                    .then(function (resp) {
                        console.log(resp.data);

                    })
                    .catch(function (data) {
                           console.log(data);
                    });
            },
            updatePassword() {
                var app = this;
                var newUser = app.user;
                axios.put('../api/password', newUser)
                    .then(function (resp) {
                        console.log(resp.data);
                        if(typeof resp.data.errors.length == 'undefined'){
                            app.errors = resp.data.errors;
                        }

                    })
                    .catch(function (data) {
                           console.log(data);
                    });
            }
        }
    }
    </script>
