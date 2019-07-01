<template>
    <div class="root-vue progress progress_content bg-gray">

        <div class="progress__container">
            <div class="progress__card">
                <div class="progress_header">
                    <h3 class="progress__title">Mi Progreso</h3>
                </div>

                <accordion v-for="(level, index) in levels" :key="index" :isAccesible="level.isAccesible">
                    <div class="flex" slot="header">

                        <h3 v-if="level.isAccesible" class="title"><strong>{{level.name}}:</strong>empatizar - definir</h3>
                        <h3 v-else class="title disabled"><strong>{{level.name}}:</strong>empatizar - definir</h3>
                    </div>

                    <div class="blocks"  v-for="block in level.blocks">

                        <div v-if="block.isAccesible" class="progress__group">
                            <h4 class="title">{{block.name}}</h4>
                            <div class="progress__bar">
                                <div class="progress__text" :style="'width:'+block.percentage+'%'"><span>{{block.percentage}}%</span></div>
                            </div>
                        </div>
                        <div v-else class="progress__group disabled">
                            <h4 class="title">{{block.name}}</h4>
                            <p >
                                Aún no has completado el bloque anterior.
                            </p>
                        </div>

                        <div v-show="block.isAccesible" class="container-village">
                            <div  class="village-progress" v-for="(village, index) in block.villages">
                                <div class="circle">

                                    <!-- <svg class="flag" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27.07 28">
                                        <defs></defs>
                                        <title>niveles</title>
                                        <g id="Capa_2" data-name="Capa 2">
                                            <g id="Layer_1" data-name="Layer 1">
                                                <line class="cls-1" x1="1.7" y1="23.3" x2="1.7" y2="0.5"/>
                                                <rect class="cls-1" x="0.5" y="23.9" width="2.4" height="3.6"/>
                                                <polygon class="cls-1" points="26.57 13.1 1.7 13.1 1.7 1.1 26.57 1.1 18.16 7.1 26.57 13.1"/>
                                            </g>
                                        </g>
                                    </svg> -->

                                    <img :src="'../images/images-news/icon' + index + '.svg'" alt="">

                                    

                                    <p class="text">{{village.villageMissionsFinishedCount}}/{{village.villageMissionsCount}}</p>

                                </div>

                                <p class="text">
                                    {{village.villageName}}
                                </p>

                            </div>
                        </div>
                    </div>
                </accordion>

            </div>
        </div>

    </div>
</template>
<script>
export default {
    mounted() {
        let app = this;
        axios.get('../api/progress')
            .then(function (resp) {
             console.log(resp.data);
            app.levels = resp.data;

            })
            .catch(function (data) {
                console.log(data);
            });

    },
    data: function () {
        return {
            levels: null,
        }
    },
    methods : {

    },

}
</script>
