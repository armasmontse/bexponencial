
//require('./conekta');
import * as R from 'ramda'
import 'vuetify/dist/vuetify.min.css'
import Vuetify from 'vuetify';
window.Vue = require('vue');
window.Vue.use(Vuetify);


//import {mediaTriger}	from './media-triger';

//Vue

/*
import {mediaManager} from './vue/components/media-manager';
import './vue/components/multi-images';
import './vue/components/single-image';
import './vue/components/cltvo-v-editor';
*/

const app = new Vue({
    el: "#admin-vue",
    data: {
		state: '',
        municipality: '',

	},
    computed: {
        states() {
            return R.pipe(
                R.pathOr([], ['states']),
                R.keys
            )(mainVueStore)
        },

        municipalities() {

            return R.pipe(
                R.pathOr([], ['states']),
                R.pathOr([], [this.state]),
                R.map(R.prop('NOM_MUN'))
            )(mainVueStore)
        },
    }
});
