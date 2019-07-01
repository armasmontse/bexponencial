<template>
    <div class="root-vue bg-yellow">
        <div v-for="village in villagesList">
            <div
                style="margin-bottom:10px;
                        display:block;
                        padding:15px;
                        border:1px solid #000;
                        border-radius:50%;
                        width:150px;"
                class="village-item">
                <router-link
                        :to="{ name: 'villages', params: { id: village.villageId } }"
                        class="btn btn-xs btn-default">
                        <p style="text-align:center" class="title">{{village.villageName}}</p>
                </router-link>
            </div>
            {{
                village.villageMissionsFinishedCount
                + ' misiones cumplidas de ' +
                village.villageMissionsCount
            }}
            <br><br><br><br><br>
        </div>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
                villagesList: null,
            }
        },
        mounted() {
            let app = this;

            //Ocupamos axios para ir por las aldeas mandando como parámetro el username
            axios
                .get('../api/map/1')
                .then(function (resp){
                console.log(resp.data);
                app.villagesList = resp.data
                })
                .catch(function (data){
                    console.log(data);
                });
        }
    }
    </script>
