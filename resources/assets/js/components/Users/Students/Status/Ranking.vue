<template>
    <div class="root-vue ranking bg-gray" data-app >
        <div class="ranking__container">
            <div class="ranking__card">
                <div class="ranking_header">
                    <h3 class="ranking__title">Ranking</h3>
                </div>

                <button class="ranking__btn" @click="initialize('escuela')" >Mi escuela</button>
                <button class="ranking__btn" @click="initialize('municipio')" >Mi municipio</button>
                <button class="ranking__btn" @click="initialize('estado')" >Mi estado</button>
                <button class="ranking__btn" @click="initialize('global')" >Global</button>

                <!-- <v-text-field
                v-model="search"
                append-icon="search"
                label="Search"
                single-line
                hide-details
                ></v-text-field> -->

                <div class="ranking__user">
                    <div class="ranking__user-photo-box">
                        <img :src="'../images/avatar.png'" alt="">
                    </div>
                    <p class="ranking__user-number">Número: <span>43</span></p>
                    <p class="ranking__user-text">Resuelve más retos para subir de puesto</p>
                </div>

                <v-data-table
                    :headers="headers"
                    :items="users"
                    :search="search"
                >
                    <template slot="items" slot-scope="props">

                        <td>{{ props.index + 1 }}</td>
                        <td class="user">
                            <img :src="props.item.photo" alt="">
                            {{ props.item.name }}
                        </td>
                        <td class="text-xs-right">{{ props.item.points }}</td>
                        <td class="text-xs-right">{{ props.item.coins }}</td>
                        <td class="text-xs-right">{{ props.item.badges }}</td>
                    </template>
                    <v-alert slot="no-results" :value="true" color="error" icon="warning">
                        Your search for "{{ search }}" found no results.
                    </v-alert>
                </v-data-table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
        search: '',
        headers: [
            { text: 'Usuario',value: 'position'},
            { text: '', value: 'name' },
            { text: 'Puntos', value: 'points' },
            { text: 'Monedas', value: 'coins' },
            { text: 'Insignias', value: 'badges' },
        ],
        users: []

        }
    },
    mounted() {
        this.initialize('global');
    },
    methods: {

        initialize(filter){
        let app = this;

        axios.get('../api/ranking/' +filter )
            .then(function (resp) {
                app.users = resp.data;
            })
            .catch(function (data) {
                //alert("Could not load your company")
            });
        }
    }
}
</script>
