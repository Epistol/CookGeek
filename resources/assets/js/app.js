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
import VueMoment from 'vue-moment';

Vue.use(VueMoment);

// Imports des composants

import VeeValidate from 'vee-validate';
import draggable from 'vuedraggable';
import StarRating from './star-rating';
import InstantSearch from 'vue-instantsearch';
import Datepicker from 'vuejs-datepicker';
import VueClazyLoad from 'vue-clazy-load';
import 'vue2-dropzone/dist/vue2Dropzone.css';
import PictureInput from 'vue-picture-input'
import Affix from 'vue-affix';
import Editor from '@tinymce/tinymce-vue';

// Composants CDG

import modal from "./components/modal/ModalView.vue";
import LoginModal from "./components/modal/LoginModal.vue";
import Notif from "./components/modal/NotifAlert.vue";
import LikeRecipe from "./components/recipe/like/LikeRecipe.vue";
import validationform from "./components/ValidateFormButton.vue";
import Autocomplete from "./components/Autocomplete.vue";
import Ingredients from "./components/recipe/ingredients/Ingredients.vue";
import NewRecipe from "./components/recipe/NewRecipe";

import SignalRecipe from "./components/recipe/Signal.vue";
import HomeRecipes from "./components/recipe/Home_Recipes.vue";


import TypeUniversIcon from "./components/Elements/Icons/TypeUniversIcon.vue";
import PictureUpload from "./components/Picture/PictureUpload.vue";
import UnivPictureUpload from "./components/Picture/UnivPictureUpload.vue";
import AddPictureRecipe from "./components/Picture/AddPictureRecipe.vue";
import AddPicture from "./components/Picture/AddPicture.vue";
import ImagePicture from "./components/Picture/Preview.vue";


import Time from "./components/Time.vue";

// Utilisation des composants
Vue.use(Affix, VueClazyLoad,  InstantSearch, Datepicker, Time, ImagePicture, SignalRecipe, modal, LoginModal, Notif, LikeRecipe, validationform, PictureUpload, UnivPictureUpload, AddPictureRecipe, AddPicture, Autocomplete, TypeUniversIcon, StarRating, Ingredients, PictureInput, NewRecipe);

// AUTRE
Vue.component('ban_list', require('./components/Admin/Ban_List'));
Vue.component('switchLight', require('./components/SwitchLight.vue'));

const app = new Vue({
    el: '#bodyWebsite',
    components: {
        draggable, VueClazyLoad,
        'editor': Editor,
        'like-recipe-async': () => ('./components/LikeRecipe.vue'),
        'signalrecipe': SignalRecipe,
        'modal': modal,
        'Notif': Notif,
        VeeValidate,
        'new-recipe-form': NewRecipe,
        'likerecipe': LikeRecipe,
        'validationform': validationform,
        'ingredient_form': Ingredients,
        'star-rating': StarRating,
        'datepicker': Datepicker,
        'homerecipes': HomeRecipes,
        'searchautocomplete': Autocomplete,
        'categ_icon': TypeUniversIcon,
        'pictureupload': PictureUpload,
        'univpictureupload': UnivPictureUpload,
        'picture-input': PictureInput,
        'add-recipe': AddPictureRecipe,
        'add-any-picture' :AddPicture,
        'login-modal': LoginModal,
        'fulltime': Time,
        'preview-image': ImagePicture,
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
        addRow: function ($index) {
            console.log($index);
            this.rows.push({});
        },
        removeRow: function (index) {
            this.rows.splice(index, 1);
        },

        addStep: function () {
            this.steps.push({});
        },

        removeStep: function (index) {
            this.steps.splice(index, 1);
        },
    },
});
const app = new Vue({
    el: '#bodyWebsite',
    components: {
        draggable, VueClazyLoad,
        'editor': Editor,
        'like-recipe-async': () => ('./components/LikeRecipe.vue'),
        'signalrecipe': SignalRecipe,
        'modal': modal,
        'Notif': Notif,
        VeeValidate,
        'new-recipe-form': NewRecipe,
        'likerecipe': LikeRecipe,
        'validationform': validationform,
        'ingredient_form': Ingredients,
        'star-rating': StarRating,
        'datepicker': Datepicker,
        'homerecipes': HomeRecipes,
        'searchautocomplete': Autocomplete,
        'categ_icon': TypeUniversIcon,
        'pictureupload': PictureUpload,
        'univpictureupload': UnivPictureUpload,
        'picture-input': PictureInput,
        'add-recipe': AddPictureRecipe,
        'add-any-picture' :AddPicture,
        'login-modal': LoginModal,
        'fulltime': Time,
        'preview-image': ImagePicture,
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
        addRow: function ($index) {
            console.log($index);
            this.rows.push({});
        },
        removeRow: function (index) {
            this.rows.splice(index, 1);
        },

        addStep: function () {
            this.steps.push({});
        },

        removeStep: function (index) {
            this.steps.splice(index, 1);
        },
    },
});
/**
 * Quand on ajoute une img dans le formulaire ajout img recette
 * @param this
 * @return val
 */

$('#upload').change(function () {
    readURL(this);
    var filename = $(this).val();
    var lastIndex = filename.lastIndexOf("\\");
    if (lastIndex >= 0) {
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
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
            $('span.file-label').text("Changer l'image");
        };
        reader.readAsDataURL(input.files[0]);
    }
}

/**
 * Navbar burger
 */
document.addEventListener('DOMContentLoaded', function () {
    // Get all "navbar-burger" elements
    var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {
        // Add a click event on each of them
        $navbarBurgers.forEach(function ($el) {
            $el.addEventListener('click', function () {
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
