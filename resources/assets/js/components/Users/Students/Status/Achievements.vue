<template>

    <div class="root-vue grid_cols2 bg-gray">

        <div class="achievements__container">
            <div class="achievements__card">

                <div class="achievements_header">
                    <h3 class="achievements__title">Mis logros</h3>
                    <div class="achievements__filter">
                        <select class="achievements__filter-select">
                            <option>
                                Último mes
                            </option>
                        </select>
                    </div>
                </div>
                <div class="grid_cols4">
                    <div v-for="(achievement, index) in achievements" class="item">
                        <img :src="'../images/images-news/logros' + (index + 1) + '.svg'"  />
                        <h5 class="item__value">
                            {{achievement[1]}}
                        </h5>
                        <p class="item__name">
                            {{achievement[0]}}
                        </p>
                    </div>
                </div>

            </div>
        </div>


        <div class="achievements__container">
            <div class="achievements__card achievements__flex">

                <div class="activities">
                    <h3 class="achievements__title">Últimas Actividades</h3>
                    <timeline :activities="activities" ></timeline>
                </div>

                <div class="skills">
                    <h3 class="achievements__title">Habilidades Desarrolladas</h3>
                    <!-- <div class="grid_cols2">
                        <div v-for="achievement in achievements" class="item">
                            <img :src="'../images/monedas.svg'"  />
                            <h5 class="item_value">
                                {{achievement[1]}}
                            </h5>
                            <p class="item_name">
                                {{achievement[0]}}
                            </p>
                        </div>
                    </div> -->

                    <div class="skills__container">
                        <div class="skills__rotate">
                            <div v-for="skill in skills" class="skills__group" @click="showSkillProgress(skill.label,skill.completed)">
                                <p class="skills__title">{{skill.label}}</p>
                                <div class="skills__bar">
                                    <div class="skills__text" :style="'width:'+skill.percentage+'%'"><span>{{skill.percentage}}%</span></div>
                                </div>
                            </div>

                        </div>

                        <div class="skills__image-center">
                            <img :src="'../images/skills-center.svg'" alt="">
                        </div>

                    </div>
                    <div class="skills__progress">
                        <p class="skills__progress-text">{{skillLabel}}</p>
                        <p class="skills__progress-text">{{skillProgressLabel}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        let app = this;
        axios.get('../api/achievements')
            .then(function (resp) {

                app.achievements = resp.data[0];
                app.activities = resp.data[1];
                app.skills = resp.data[2];
                app.skillLabel = app.skills[0]["label"];
                app.skillProgressLabel = app.skills[0]["completed"];
            })
            .catch(function (data) {
                console.log(data);
            });

    },
    data: function () {
        return {
            achievements: null,
            activities: null,
            skills: null,
            skillLabel: "",
            skillProgressLabel:""
        }
    },

    methods: {
        showSkillProgress(label, completed) {
            this.skillLabel = label;
            this.skillProgressLabel = completed;
        }
    }
}
</script>
