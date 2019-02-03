/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./dropzone');
require('./sticky');
require('./star-rating');

window.Vue = require('vue');
import Vue from 'vue';

// Imports des composants

import VeeValidate from 'vee-validate';
import draggable from 'vuedraggable';
import StarRating from './star-rating';
import InstantSearch from 'vue-instantsearch';
import Datepicker from 'vuejs-datepicker';
import VueClazyLoad from 'vue-clazy-load';
import 'vue2-dropzone/dist/vue2Dropzone.css';

// Composants CDG


import Ingredients from "./components/Ingredients.vue";

import IngredientsEdit from './components/Recipe/IngredientsEdit.vue';
import SignalRecipe from "./components/Recipe/Signal.vue";
import StepsEdit from "./components/Recipe/StepsEdit.vue";

// Utilisation des composants

Vue.use(InstantSearch, Datepicker, VueClazyLoad, SignalRecipe, StepsEdit, StarRating, Ingredients, IngredientsEdit);

// Vue.component('recherche', require('./components/Recherche.vue'));
Vue.component('validationform', require('./components/ValidateFormButton.vue'));
Vue.component('searchautocomplete', require('./components/Autocomplete.vue'));

// AUTRE
Vue.component('categ_icon', require("./components/Elements/Icons/TypeUniversIcon"));
Vue.component('pictureupload', require("./components/Picture/PictureUpload"));
Vue.component('univpictureupload', require("./components/Picture/UnivPictureUpload"));

Vue.component('ban_list', require('./components/Admin/Ban_List'));
Vue.component('switchLight', require('./components/SwitchLight.vue'));

const app = new Vue({
	el: '#bodyWebsite',
	components: {
		draggable,
		'like-recipe-async': () => ('./components/LikeRecipe.vue'),
		'signalrecipe': SignalRecipe,
		VeeValidate,
		'ingredient_form': Ingredients,
		'star-rating': StarRating,
		'datepicker': Datepicker,
		'ingredient-edit-form': IngredientsEdit,
		'stepsedit': StepsEdit,
	},

	data: {
		titre: '',
		showModalLike: false,
		showModal: false,
		magic_flag: false,

		steps: [
			{etape: '',},
			{etape: '',}
		],
		rows: [
			{name: '', qtt: '',},
			{name: '', qtt: '',},
		],
		seen: true,
	},

	methods: {
		addRow: function($index) {
			console.log($index);
			this.rows.push({});
		},
		removeRow: function(index) {
			this.rows.splice(index, 1);
		},

		addStep: function() {
			this.steps.push({});
		},

		removeStep: function(index) {
			this.steps.splice(index, 1);
		},
	},
});

/**
 * Quand on ajoute une img dans le formulaire ajout img recette
 * @param this
 * @return val
 */

$('#upload').change(function() {
	readURL(this);
	var filename = $(this).val();
	var lastIndex = filename.lastIndexOf("\\");
	if(lastIndex >= 0) {
		filename = filename.substring(lastIndex + 1);
	}
	$('#filename').val(filename);
});


/**
 * Lecture de l'img pour l'upload d'img
 * @param input
 * @return readasDataUrl()
 */
function readURL(input) {
	if(input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#blah').attr('src', e.target.result);
			$('span.file-label').text("Changer l'image");
		};
		reader.readAsDataURL(input.files[0]);
	}
}

/**
 * Navbar burger
 */
document.addEventListener('DOMContentLoaded', function() {
	// Get all "navbar-burger" elements
	var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
	// Check if there are any navbar burgers
	if($navbarBurgers.length > 0) {
		// Add a click event on each of them
		$navbarBurgers.forEach(function($el) {
			$el.addEventListener('click', function() {
				// Get the target from the "data-target" attribute
				var target = $el.dataset.target;
				var $target = document.getElementById(target);
				// Toggle the class on both the "navbar-burger" and the "navbar-menu"
				$el.classList.toggle('is-active');
				$target.classList.toggle('is-active');
			});
		});
	}
});