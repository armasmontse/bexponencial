<template>
<div class="missions root-vue">

    <loader id="loader"></loader>

    <div id="village" class="scrollContainer horizontal">
        <!--   Definimos elementos animables de la aldea     -->
        <div id="section0" class="scene">

            <div id="imagemap" class="parallaxParent islandP" :style="'width:'+imagewidth+'vw'">

                <img id="img-maps-1" class="img-maps island parallaxLayer desktop" usemap="#image-map-desktop" style="position:absolute;" data-type="desktop" :src="'../images/aldea1/zamna-31.jpg'" />
                <map name="image-map-desktop">
                    <area target="" alt="" data-name="Intro" data-type="desktop" title="Intro" href="" coords="1204,835,NaN" shape="circle">
                    <area v-for="mission in missionsList" data-type="desktop" :data-progress="mission.progress" data-name="Misión" :data-mission="mission.missionId" :coords="mission.coords" shape="circle">

                </map>

                <img id="img-maps-2" class="img-maps island parallaxLayer mobile" usemap="#image-map-mobile" style="position:absolute;" :src="'../images/aldea1/zamna-2.png'" />
                <map name="image-map-mobile">
                    <area target="" alt="" data-name="Intro" data-type="mobile" title="Intro" href="" coords="1463,1993,236" shape="circle">
                    <area v-for="mission in missionsList" data-type="mobile" :data-progress="mission.progress" data-name="Misión" :data-mission="mission.missionId" :coords="mission.mobile_coords" shape="circle">
                </map>

                <div id="zamna" class="parallaxParent islandP">
                    <div class="island parallaxLayer">
                        <img class="island parallaxLayer" :src="'../images/aldea1/layer-letrero-zamna.png'" alt="">
                    </div>
                </div>


                <div id="sol" class="parallaxParent islandP">
                    <div class="island parallaxLayer">
                        <img class="island parallaxLayer" :src="'../images/sol.svg'" />
                    </div>
                </div>

                <div id="rosa" class="parallaxParent islandP">
                    <div class="island parallaxLayer">
                        <img class="island parallaxLayer" :src="'../images/rosa.svg'" />
                    </div>
                </div>

                <div class="container-reguilete left">
                    <div class="content" style="possition: relative">
                        <div v-for="(n, index) in 13" :class="'reguilete reguilete-' + n">
                            <div class="poste parallaxParent islandP">
                                <img class="island parallaxLayer" :src="'../images/poste.svg'" />
                            </div>
                            <div class="elice parallaxParent islandP " :class="'elice-' + n">
                                <div class="island parallaxLayer">
                                    <img class="island parallaxLayer" :src="'../images/eolica3.svg'" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- E L E M E N T O S   E N   M O V I M I E N T O -->
                <div id="nubes" class="parallaxParent islandP ">
                    <div class="island parallaxLayer">
                        <img class="island parallaxLayer" :src="'../images/nubes.svg'" />
                    </div>
                </div>
                <div id="nubes1" class="parallaxParent islandP">
                    <div class="island parallaxLayer">
                        <img class="island parallaxLayer" :src="'../images/nubes1.svg'" />
                    </div>
                </div>
                <div id="nubes2" class="parallaxParent islandP ">
                    <div class="island parallaxLayer">
                        <img class="island parallaxLayer" :src="'../images/nubes2.svg'" />
                    </div>
                </div>
                <div id="nubes3" class="parallaxParent islandP">
                    <div class="island parallaxLayer">
                        <img class="island parallaxLayer" :src="'../images/nubes3.svg'" />
                    </div>
                </div>
                <div id="nubes4" class="parallaxParent islandP">
                    <div class="island parallaxLayer">
                        <img class="island parallaxLayer" :src="'../images/nubes4.svg'" />
                    </div>
                </div>


                <div id="barco1" class="parallaxParent islandP ">
                    <div class="island parallaxLayer">
                        <img class="island parallaxLayer" :src="'../images/barco1.svg'" />
                    </div>
                </div>
                <div id="barco2" class="parallaxParent islandP ">
                    <div class="island parallaxLayer">
                        <img class="island parallaxLayer" :src="'../images/barco2.svg'" />
                    </div>
                </div>
                <div id="barco3" class="parallaxParent islandP ">
                    <div class="island parallaxLayer">
                        <img class="island parallaxLayer" :src="'../images/barco3.svg'" />
                    </div>
                </div>


                <div id="montanas" class="parallaxParent islandP">
                    <div class="island parallaxLayer">
                        <img class="island parallaxLayer" :src="'../images/montanas.svg'" />
                    </div>
                </div>


                <div class="container-reguilete center">
                    <div class="content" style="position: relative">
                        <div v-for="(n, index) in 7" :class="'reguilete reguilete-' + n">

                            <div class="poste parallaxParent islandP">
                                <img class="island parallaxLayer" :src="'../images/poste.svg'" />
                            </div>
                            <div class="elice parallaxParent islandP " :class="'elice-' + n">
                                <div class="island parallaxLayer">
                                    <img class="island parallaxLayer" :src="'../images/eolica3.svg'" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="container-reguilete center-right">
                    <div class="content" style="possition: relative">
                        <div v-for="(n, index) in 7" :class="'reguilete reguilete-' + n">

                            <div class="poste parallaxParent islandP">
                                <img class="island parallaxLayer" :src="'../images/poste.svg'" />
                            </div>
                            <div class="elice parallaxParent islandP " :class="'elice-' + n">
                                <div class="island parallaxLayer">
                                    <img class="island parallaxLayer" :src="'../images/eolica3.svg'" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="container-reguilete right">
                    <div class="content" style="possition: relative">
                        <div v-for="(n, index) in 7" :class="'reguilete reguilete-' + n">

                            <div class="poste parallaxParent islandP">
                                <img class="island parallaxLayer" :src="'../images/poste.svg'" />
                            </div>
                            <div class="elice parallaxParent islandP " :class="'elice-' + n">
                                <div class="island parallaxLayer">
                                    <img class="island parallaxLayer" :src="'../images/eolica3.svg'" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- T E R M I N A  E L E M E N T O S   E N   M O V I M I E N T O -->

        <div v-for="(mission, index) in missionsList" :id="'section'+(index+1)" class="scene">
            <div v-if="index==0" class="parallaxParent islandP" :style="'width: calc(100% * '+missionsList.length+')'">
                <img class="island parallaxLayer" style="position:absolute;" :src="'../images/layer-4-piso.png'" />
            </div>

            <div v-if="index==0" class="parallaxParent islandP" :style="'width: calc(100% * '+missionsList.length+')'">

            </div>

            <br>

        </div>

    </div>
    <div class="village__controls">
        <ul class="village__controls-back">
            <a :class="'village-selector info'" :data-scene="'#section0'">
                <li>

                </li>
            </a>

            <a v-for="(mission, index) in missionsList" :class="'village-selector ' + (index+1)" :data-scene="'#section'+(index+1)">
                <li>

                </li>
            </a>

        </ul>
    </div>


</div>
</template>
<script>
import $ from 'jquery';
$(window).on('load', function() {
    $("#loader").fadeOut(3000);
});
    export default {
        data: function () {
            return {
                villageId: null,
                missionsList: [],

            }
        },
        computed: {
            imagewidth: function(){
                var width=500;
                if(this.missionsList.length>0){
                    width=(this.missionsList.length+1)*100
                }

                return width
            }
        },
        mounted() {

            let app = this;
            app.villageId = app.$route.params.id;
            axios
                .get('../api/missions/' + app.villageId)
                .then(function (resp){
                    app.missionsList = resp.data.missions;
                    console.log(app.missionsList);

                })
                .catch(function (data){
                    console.log(data);
                });

        },
        updated: function () {
            var app = this;
        this.$nextTick(function () {
        $('img[usemap]').imageMap();

        })
    },
        methods: {
            saveForm() {
                console.log("hola");
            }
        }
    }

    </script>
