<template>
    <div class="root-vue account-info bg-yellow">
    <h1 style="text-align:center;font-size:40px;color:white;">¡Hola {{name}}!</h1>
    <h3 style="text-align:center;font-size:40px;color:white;">¡Bienvenid@ a tu mundo!</h3>

    </div>
</template>
<script>
export default {
    mounted() {
        let app = this;


    },
    data: function () {
        return {
            name: bexpo.user,
            user: {mail: "",info: {}, address: {}}
        }
    },

    methods: {
        saveForm() {

        }
    }
}
</script>
