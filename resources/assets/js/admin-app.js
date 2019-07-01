require('./bootstrap');
//require('./conekta');
import * as R from 'ramda'
import 'vuetify/dist/vuetify.min.css'



import {ifElementExistsThenLaunch} from './functions/dom';
import {w} from './cltvo/constants.js';
//import {alertsController} from './alerts-controller';
import {adminMainMenu} from './admin-main-menu';
//import {mediaTriger}	from './media-triger';

//Vue

/*
import {mediaManager} from './vue/components/media-manager';
import './vue/components/multi-images';
import './vue/components/single-image';
import './vue/components/cltvo-v-editor';
*/
w.on('load', () => {
	ifElementExistsThenLaunch([
		[],
		//['#alert__container', alertsController, 'init', []],
		['#admin-main-menu', adminMainMenu, undefined, [$,'.nav_JS','.label_JS','.tree_JS', 'label_active']],
		//mediaTriger,
	]);
});
