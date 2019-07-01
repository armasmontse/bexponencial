<template>
    <div class="secretFile">
        <div class="secretFile__row bg-gradient-yellow">
            <div class="secretFile__container">
                <div class="secretFile__content">

                    <img :src="'/images/secretFile.svg'" alt="">
                    <h3 class="secretFile__title">ARCHIVO SECRETO</h3>
                    <h4 class="secretFile__sbtitle">Aldea {{villageName}}</h4>
                    <p class="secretFile__desc">{{ fileDesc }}</p>
                    <div v-show="!showFile">
                        <button
                            type="button"
                            @click="purchaseSecretFile()" >
                            Comprarlo por <span> ${{ filePrice }}</span>
                        </button>
                    </div>


                </div>
            </div>
        </div>

        <div class="secretFile__row" v-if="showFile">
            <div class="secretFile__container mosaico">
                <div class="secretFile__filters">
                    <div class="flex">
                        <div class="secretFile__filter">
                            <select class="secretFile__filter-select">
                                <option>
                                    Selecciona un tema
                                </option>
                            </select>
                        </div>
                        <div class="secretFile__filter">
                            <select class="secretFile__filter-select">
                                <option>
                                    Tipo de recurso
                                </option>
                            </select>
                        </div>
                        <button>Borrar filtros</button>
                    </div>

                    <div class="secretFile__search">
                        <input type="search" placeholder="Buscar:">
                        <button>Ok</button>
                    </div>
                </div>

                <div class="secretFile__body">

                    <div class="secretFile__card" v-for="(file, index) in filesInfo" v-bind:data-index="index">
                        <div class="box-aspect-ratio"  v-if="file.type == 'jpg'">
                            <!-- <div class="imagen-aspect-ratio"></div> -->
                            <img class="imagen-aspect-ratio" :src="'/images/' + file.url" alt="">
                        </div>
                        <div class="box-aspect-ratio" v-if="file.type == 'video'">
                            Mostramos el video de {{ file.url }}
                        </div>
                        <div class="box-aspect-ratio" v-if="file.type == 'pdf'">
                            Mostramos el pdf de {{ file.url }}
                            <!-- <iframe :src="'/images/' + file.url" frameborder="0"></iframe> -->
                        </div>
                        <div class="box-content">
                            <h3 class="title">{{ file.file_name }}</h3>
                            <h4 class="sbtitle">{{ file.title }}</h4>
                            <p class="text">{{ file.description }}</p>
                        </div>
                    </div>

                </div>

            </div>


        <div class="secretFile__modal">
            <div class="secretFile__modal-container">
                <div class="secretFile__close-JS">
                    <img :src="'/images/images-news/boton-cerrar-hover.svg'" alt="">
                </div>
                <div class="secretFile__modal-content">


                    <div class="slider">
                        <div class="slider__modal" v-for="(file, index) in filesInfo">
                            <div class="title">
                                <h3 class="secretFile__title">ARCHIVO SECRETO <span>{{ index+1 }}/10</span></h3>
                                <h4 class="secretFile__sbtitle">Aldea {{villageName}}</h4>
                            </div>
                            <div class="box-content">

                                <h3 class="title">{{ file.file_name }}</h3>
                                <h4 class="sbtitle">{{ file.title }}</h4>
                                <h5 class="description">{{ file.description }}</h5>
                                <p class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                    Ut wisi enim ad minim veniam, quis nostrud exerci esto es un link tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
                            </div>

                            <div class="box-aspect-ratio"  v-if="file.type == 'jpg'">
                                <!-- <div class="imagen-aspect-ratio"></div> -->
                                <img class="imagen-aspect-ratio" :src="'/images/' + file.url" alt="">
                            </div>
                            <div class="box-aspect-ratio" v-if="file.type == 'video'">
                                Mostramos el video de {{ file.url }}
                            </div>
                            <div class="box-aspect-ratio" v-if="file.type == 'pdf'">
                                Mostramos el pdf de {{ file.url }}
                                <!-- <iframe :src="'/images/' + file.url" frameborder="0"></iframe> -->
                            </div>
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
                villageName: null,
                filePrice: null,
                fileDesc: null,
                userCoins: null,
                showFile: false,
                filesInfo: []
            }
        },

        mounted() {
            let app = this;
            app.villageId = this.$route.params.id;
            axios
                .get('../api/secretFile/' + app.villageId)
                .then(function (resp){
                    console.log(resp);
                    app.villageName = resp.data.villageName;
                    app.filePrice = resp.data.filePrice;
                    app.fileDesc = resp.data.fileDesc;
                    app.userCoins = resp.data.userCoins;
                    app.showFile = resp.data.showFile;
                    app.filesInfo = resp.data.filesInfo;
                })
                .catch(function (data){
                    console.log(data);
                    alert('Ocurrió algún problema');
                });
        },
        methods: {
            purchaseSecretFile(){
                let app = this;
                //Si las monedas que tiene son menos que el precio
                if(app.userCoins < app.filePrice){
                    alert('No tienes monedas suficientes para comprar el archivo');
                    //Sugerencua para comprar moendas
                    return;
                }

                axios
                    .get('../api/purchaseSecretFile/' + app.villageId)
                    .then(function (resp){
                        app.showFile = resp.data.showFile;
                        if(app.showFile){
                            alert('Archivo secreto desbloqueado');
                        }
                    })
                    .catch(function (data){
                        console.log(data);
                        alert('Ocurrió algún problema');
                    });

            }
        }
    }
</script>
