<template>
    <div class="root-vue drive bg-white">
        <div class="drive__row">
            <div class="drive__container">

                <!--  P A N T A L L A    #1 -->
                <div class="drive__content">
                    <h3 class="drive__title">Be Drive {{ levelName }}</h3>
                    <p class="drive__text">Aqui encuentras todo...Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                </div>

                <div class="drive__content-btn">
                    <button class="drive__btn" v-for="(level, index) in levels"
                        @click="getBlocks(level.id, level.label)">
                         {{ level.label }}
                    </button>
                </div>


                <!--  P A N T A L L A    #2 -->
                <!--<div class="drive__content">
                    <h3 class="drive__title">BE DRIVE > encuentra</h3>
                    <p class="drive__text">Aqui encuentras todo...Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                </div>-->

                <div class="drive__collapse"
                    v-for="(block, blockIndex) in blocks">
                    <accordion :isAccesible="true">
                        <div class="flex" slot="header">
                            <svg class="folder" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.19 15">
                                <defs></defs>
                                <title>folder</title>
                                <g id="Capa_2" data-name="Capa 2">
                                    <g id="Layer_1" data-name="Layer 1">
                                        <path class="cls-1" d="M16.69,7V2.51a.86.86,0,0,0-.86-.85H7.49C6.2,1.66,6.45.5,5.41.5H2.06C.94.5.5,1.66.5,2.3V7"/>
                                        <rect class="cls-1" x="0.5" y="4.07" width="16.19" height="10.43" rx="1.38" ry="1.38"/>
                                    </g>
                                </g>
                            </svg>

                            <h4 class="accordion__question">{{ block.name }}</h4>
                        </div>
                        <div class="accordion__answer"
                             v-for="(village, villageIndex) in block.villages">
                            <!-- collapse dentro de collapse -->
                            <accordion :isAccesible="true">
                                <div class="flex" slot="header">
                                    <svg class="folder" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.19 15">
                                        <defs></defs>
                                        <title>folder</title>
                                        <g id="Capa_2" data-name="Capa 2">
                                            <g id="Layer_1" data-name="Layer 1">
                                                <path class="cls-1" d="M16.69,7V2.51a.86.86,0,0,0-.86-.85H7.49C6.2,1.66,6.45.5,5.41.5H2.06C.94.5.5,1.66.5,2.3V7"/>
                                                <rect class="cls-1" x="0.5" y="4.07" width="16.19" height="10.43" rx="1.38" ry="1.38"/>
                                            </g>
                                        </g>
                                    </svg>

                                    <h4 class="accordion__question">{{ village.name }}</h4>
                                </div>

                                <div class="accordion__answer" v-for="(mission, missionIndex) in village.missions">
                                    <ul class="accordion__file">

                                        <li>
                                            <router-link
                                                :to="{ name: 'drive-single', params: { id: mission.id } }">
                                                {{ mission.label }}
                                            </router-link>
                                        </li>
                                    </ul>

                                </div>
                            </accordion>

                            <!--<accordion>
                                <div class="flex" slot="header">
                                    <svg class="folder" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.19 15">
                                        <defs></defs>
                                        <title>folder</title>
                                        <g id="Capa_2" data-name="Capa 2">
                                            <g id="Layer_1" data-name="Layer 1">
                                                <path class="cls-1" d="M16.69,7V2.51a.86.86,0,0,0-.86-.85H7.49C6.2,1.66,6.45.5,5.41.5H2.06C.94.5.5,1.66.5,2.3V7"/>
                                                <rect class="cls-1" x="0.5" y="4.07" width="16.19" height="10.43" rx="1.38" ry="1.38"/>
                                            </g>
                                        </g>
                                    </svg>

                                    <h4 class="accordion__question">Zamná</h4>
                                </div>

                                <div class="accordion__answer">
                                    <ul class="accordion__file">
                                        <li>
                                            Construye tu ciudad sostenible
                                        </li>
                                        <li>
                                            Exploración industrial
                                        </li>
                                        <li>
                                            Entrevista a un jefe
                                        </li>
                                    </ul>

                                </div>
                            </accordion>-->

                        </div>
                    </accordion>


                    <!-- Collapse Disable -->
                    <!--<accordion>
                        <div class="flex disabled" slot="header">
                            <svg class="folder" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.19 15">
                                <defs></defs>
                                <title>folder</title>
                                <g id="Capa_2" data-name="Capa 2">
                                    <g id="Layer_1" data-name="Layer 1">
                                        <path class="cls-1" d="M16.69,7V2.51a.86.86,0,0,0-.86-.85H7.49C6.2,1.66,6.45.5,5.41.5H2.06C.94.5.5,1.66.5,2.3V7"/>
                                        <rect class="cls-1" x="0.5" y="4.07" width="16.19" height="10.43" rx="1.38" ry="1.38"/>
                                    </g>
                                </g>
                            </svg>

                            <h4 class="accordion__question">Tu persona</h4>
                        </div>

                        <div class="accordion__answer">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros
                            et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>

                        </div>
                    </accordion>-->

                </div>





            </div>
        </div>

    </div>
</template>
<script>
export default {
    data: function () {
            return {
                levels: [],
                blocks: [],
                //villages: [],
                levelName: null
            }
        },
    mounted() {
        let app = this;

        axios
            .get('../api/getLevels')
            .then(function (resp){
                app.levels = resp.data;
            })
            .catch(function (data){
                console.log(data);
                alert('Ocurrió algún problema en mounted');
            });
    },
    methods: {
        getBlocks(id, label){
            let app = this;
            app.levelName = label;
            //Vamos por los bloques
            axios
                .get('../api/getBlocks/' + id)
                .then(function (resp){
                    console.log(resp.data);
                    app.blocks = resp.data;
                    //app.villages = resp.data.villages;
                })
                .catch(function (data){
                    console.log(data);
                    alert('Ocurrió algún problema en getBlocks');
                });
        },
    }
}
</script>
