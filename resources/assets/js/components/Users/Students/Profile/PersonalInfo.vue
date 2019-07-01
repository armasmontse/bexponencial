<template>
<div class="account-info bg-gray">
    <transition name="fade" :duration="{ enter: 500, leave: 800 }" >
        <flash v-show="success">
            <h2 class="success" slot="body">{{message}}</h2>
        </flash>
    </transition>
    <transition name="fade" :duration="{ enter: 500, leave: 800 }" >
        <flash v-show="showError">
            <h2 class="error" slot="body">Debes completar los campos faltantes.</h2>
        </flash>
    </transition>
    <div class="account__container">
        <div class="account__card">
            <form>
                <input type="hidden" name="_token" :value="csrf">
                <div class="info-form ">
                    <div class="info-form--container">
                        <div class="account__left">
                            <h3 class="account__title">Mi cuenta</h3>

                            <div class="account__form">
                                <label class="account__label">Imagen de perfil</label>

                                <div class="account__form-photo-box">
                                    <span class="image">
                                        <input class="aux-class" ref="profilePic" type="file" @change="addFile" accept="image/x-png,image/gif,image/jpeg" />
                                    </span>
                                    <label for="addFile">
                                        <div class="file-imageBack"></div>
                                        <img id="profilePic" v-if="hasImage" class="gallery__container--img" :src="user.info.photo">
                                    </label>
                                </div>
                            </div>

                            <div class="account__form">
                                <label class="account__label">Nombre Completo</label>
                                <input class="account__form-input" placeholder="Nombre completo" type="text" v-model="user.info.full_name" />
                                <p class="account__error">{{ issetProperty('user.info.full_name',errors) ? errors['user.info.full_name'].toString() : "" }}</p>
                            </div>

                            <div class="account__form">
                                <label class="account__label">Email</label>
                                <input class="account__form-input" type="text" v-model="user.email" />
                                <p class="account__error">{{ issetProperty('user.email',errors) ? errors['user.email'].toString() : "" }}</p>
                            </div>

                            <div class="account__form">
                                <label class="account__label">Teléfono</label>
                                <input class="account__form-input" type="text" v-model="user.address.phone" />
                                <p class="account__error">{{ issetProperty('user.address.phone',errors) ? errors['user.address.phone'].toString() : "" }}</p>
                            </div>

                            <div class="account__form">
                                <label class="account__label">Código postal</label>
                                <input class="account__form-input" type="text" v-model="user.address.zip_code" />
                                <p class="account__error">{{ issetProperty('user.address.zip_code',errors) ? errors['user.address.zip_code'].toString() : "" }}</p>
                            </div>

                            <div class="account__form">
                                <label class="account__label">Calle</label>
                                <input class="account__form-input" type="text" v-model="user.address.street" />
                                <p class="account__error">{{ issetProperty('user.address.street',errors) ? errors['user.address.street'].toString() : "" }}</p>
                            </div>

                            <div class="account__form">
                                <label class="account__label">No. Calle</label>
                                <input class="account__form-input" type="text" v-model="user.address.street_no" />
                                <p class="account__error">{{ issetProperty('user.address.street_no',errors) ? errors['user.address.street_no'].toString() : "" }}</p>
                            </div>

                            <div class="account__form">
                                <label class="account__label">Colonia</label>
                                <input class="account__form-input" type="text" v-model="user.address.neighbourhood" />
                                <p class="account__error">{{ issetProperty('user.address.neighbourhood',errors) ? errors['user.address.neighbourhood'].toString() : "" }}</p>
                            </div>

                            <div class="account__form">
                                <label class="account__label">Ciudad</label>
                                <input class="account__form-input" type="text" v-model="user.address.city" />
                                <p class="account__error">{{ issetProperty('user.address.city',errors) ? errors['user.address.city'].toString() : "" }}</p>
                            </div>

                            <div class="account__form">
                                <label class="account__label">Estado</label>
                                <input class="account__form-input" type="text" v-model="user.address.state" />
                                <p class="account__error">{{ issetProperty('user.address.state',errors) ? errors['user.address.state'].toString() : "" }}</p>
                            </div>

                            <div class="account__form">
                                <label class="account__label">Fecha de nacimiento</label>
                                <input class="account__form-input" type="text" v-model="user.info.birth_date" />
                                <p class="account__error">{{ issetProperty('user.info.birth_date',errors) ? errors['user.info.birth_date'].toString() : "" }}</p>
                            </div>

                            <div class="account__form account__form-password">
                                <label class="account__label">Contraseña</label>
                                <a class="account__label-underline" href="" @click.prevent="showPassword">Cambiar contraseña</a>
                            </div>

                            <div class="account__password">
                                <label class="account__password-hidden" for="">********</label>
                            </div>

                            <div class="password" v-show="saveAll">


                                <div class="account__form">
                                    <label class="account__label auth__form--titleInput">contraseña actual</label>
                                    <input type="password" class="account__form-input auth__form--input form--input" v-model="user.old_password" required>
                                    <p class="account__error">{{ issetProperty('old_password',errors) ? errors['old_password'].toString() : "" }}</p>
                                </div>

                                <div class="account__form">
                                    <label class="account__label auth__form--titleInput">Nueva contraseña</label>
                                    <input class="account__form-input" type="password" v-model="user.password" required>
                                    <label class="account__label-small" for="">Mínimo 8 caracteres.</label>
                                    <p class="account__error">{{ issetProperty('password',errors) ? errors['password'].toString() : "" }}</p>
                                </div>

                                <div class="account__form">
                                    <label class="account__label auth__form--titleInput">Repetir Nueva contraseña</label>
                                    <input class="account__form-input" type="password" v-model="user.password_confirmation" required>

                                </div>
                            </div>
                        </div>

                         <!--<div class="account__right">
                            <h3 class="account__title">Mi escuela</h3>

                            <div class="account__form">
                                <label class="account__label">Nombre de la escuela</label>
                                <div class="account__form-select">
                                    <select>
                                        <option value="">Selecciona</option>
                                        <option value="">Nombre</option>
                                    </select>
                                </div>
                            </div>
                            <div class="account__form select">
                                <label class="account__label">Estado</label>
                                <div class="account__form-select">
                                    <select>
                                        <option value="">Selecciona</option>
                                        <option value="">Estado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="account__form">
                                <label class="account__label">Municipio</label>
                                <div class="account__form-select">
                                    <select>
                                        <option value="">Selecciona</option>
                                        <option value="">Municipio</option>
                                    </select>
                                </div>
                            </div>

                            <h3 class="account__title margTop">Mi(s) Padre(s) o Tutor</h3>
                            <div class="account__form">
                                <label class="account__label">Nombre de padre o tutor</label>
                                <input class="account__form-input" placeholder="Nombre Apellido Apellido" type="text" />
                            </div>

                            <div class="account__form">
                                <label class="account__label">E-mail de padre o Tutor</label>
                                <input class="account__form-input" placeholder="mail@mail.com" type="text" />
                            </div>
                        </div>-->

                    </div>

                    <div class="form-bottom">
                        <div v-show="!saveAll">
                            <button class="account__form-btn" type="button" @click="saveInfo">Guardar</button>
                        </div>
                        <div v-show="saveAll">
                            <button class="account__form-btn" id="saveWP" type="button" @click="saveInfoWithPassword">Guardar</button>
                        </div>

                    </div>
                </div>

            </form>

            <div class="account__legals">
                <a class="account__label-underline" href="#">Aviso de privacidad</a>
                <a class="account__label-underline" href="#">Términos y condiciones</a>
            </div>
        </div>
    </div>

</div>
</template>
<script>
    export default {
        mounted() {
            let app = this;

            axios.get('../api/info/' + bexpo.user)
                .then(function (resp) {
                    app.user = resp.data;
                    if(app.user.info.photo !== "/storage/"){

                      app.hasImage=true;
                    }
                    //console.log(app.user.photo);
                })
                .catch(function (data) {
                    console.log(data);
                });
        },
        data: function () {
            return {
              success:false,
              message: "",
                showError: false,
                hasImage: false,
                errors: [],
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                saveAll:false,
                user: {email: "",info: {}, address: {},old_password:"",password:"",password_confirmation:""}
            }
        },

        methods: {
          newPic(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profilePic').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
                this.hasImage=true;
            }
            },
            issetProperty(prop, obj){

              if(prop in obj){
                return true;
              }else{
                return false;
              }

            },
            addFile(event){
                //Asignamos la imagen a  nuestra data
                this.newPic(event.target);
                this.user.photo = event.target.files[0];
            },
            saveInfo() {
                var app=this;
                var data = new FormData();
                data.append('user', JSON.stringify(this.user));
                data.append('photo', this.user.photo);
                data.append('_method', 'POST');
                app.errors = [];
                axios.post('../api/infou/' + bexpo.user, data)
                    .then(function (resp) {

                        if('success' in resp.data){
                            app.message= resp.data.success
                          app.success = true;
                          setTimeout(() => {
                             app.success = false;
                          }, 2000);

                        }else{


                            app.errors = resp.data.errors;

                            app.showError = true;
                            setTimeout(() => {
                               app.showError = false;
                            }, 2000);
                        }

                        //this.$router.replace('/');
                    })
                    .catch(error => {

                    })
            },
            saveInfoWithPassword() {
                var app=this;
                var newUser =this.user;

                app.errors = [];
                axios.put('../api/infowp/' + bexpo.user, newUser)
                    .then(function (resp) {
                        console.log(resp.data);
                        if('success' in resp.data){
                            app.message= resp.data.success
                          app.success = true;
                          setTimeout(() => {
                             app.success = false;
                          }, 2000);

                        }else{


                            app.errors = resp.data.errors;
                            app.showError = true;
                            setTimeout(() => {
                               app.showError = false;
                            }, 2000);
                        }

                        //this.$router.replace('/');
                    })
                    .catch(error => {

                    })
            },
            showPassword() {
                this.saveAll=!this.saveAll;
            }
        }
    }
    </script>
