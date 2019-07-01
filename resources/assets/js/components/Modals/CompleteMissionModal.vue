<template>
    <div class="missions__finished">

        <div class="missions__finished-container">

            <div class="missions-modal__content">
                <!--<img :src="''" />-->
                <p class="missions__congrats">
                    Finalizaste todos los retos de la Misión:
                     <br>
                    Por terminar la Misión, además de los puntos de cada reto, has obtenido

                </p>

                <br><br>
                <div class="missions__prices">
                    <p>
                        20
                    </p>
                    <img  :src="'../images/images-news/puntos.svg'" />
                </div>

                <br><br>

                <router-link class="next-mission" :to="{ name: 'mission', params: { id: 1} }">
                    <p style="text-align:center" class="title">Siguiente misión</p>
                </router-link>

                <br><br>
                <div class="close-modal" @click="close()">
                    <img :src="'../images/boton-cerrar.svg'" />
                </div>

                <p class="missions__extra">
                    ¿Quieres más monedas?
                    Evalúa la respuesta de un compañero y recibe

                </p>
                <div class="missions__extras">
                    <p>
                        10
                    </p>
                    <img  :src="'../images/images-news/monedas.svg'" />
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['nextMissionId', 'missionName', 'questionId'],
        methods:{
             close(){
                this.$emit('closeM');
            }
        }
    }
</script>
