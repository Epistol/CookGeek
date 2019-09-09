/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./dropzone');
require('./sticky');
require('./toasty/jquery.toasty');
require('./star-rating');

window.Vue = require('vue');

import Vue from 'vue';
import VueMoment from 'vue-moment';
import Locale from './vue-i18n-locales.generated';

Vue.use(VueMoment);
import VueInternationalization from 'vue-i18n';

Vue.use(VueInternationalization);
import InstantSearch from 'vue-instantsearch';

Vue.use(InstantSearch);

// Imports des composants
import VeeValidate from 'vee-validate';
import draggable from 'vuedraggable';
import Password from 'vue-password-strength-meter';
import VueClazyLoad from 'vue-clazy-load';
import 'vue2-dropzone/dist/vue2Dropzone.min.css';
//import Affix from 'vue-affix';
import Affix from 'vue-affix';

Vue.use(Affix);

// AUTRE

const lang = document.documentElement.lang.substr(0, 2);
const i18n = new VueInternationalization({
    locale: lang,
    messages: Locale
});

const app = new Vue({
    el: '#app',
    i18n,
    components: {
        draggable, VueClazyLoad,
        'like-recipe-async': () => ('./components/LikeRecipe.vue'),
        'signalrecipe': () => import('./components/recipe/Signal.vue'),
        'modal': () => import('./components/modal/ModalView'),
        VeeValidate,
        'Notif': () => import('./components/modal/NotifAlert.vue'),
        'React': () => import('react'),
        'bigsearch': () => import('./components/BigSearch'),
        'password': () => import("./components/PasswordInputComponent"),
        'new-recipe-form': () => import("./components/recipe/NewRecipe"),
        'likerecipe': () => import("./components/recipe/like/LikeRecipe.vue"),
        'validationform': () => import("./components/ValidateFormButton.vue"),
        'ingredient_form': () => import("./components/recipe/ingredients/Ingredients.vue"),
        'star-rating': () => import("./star-rating"),
        'datepicker': () => import("vuejs-datepicker"),
        'homerecipes': () => import("./components/recipe/Home_Recipes.vue"),
        'searchautocomplete': () => import("./components/Autocomplete.vue"),
        'categ_icon': () => import("./components/elements/Icons/TypeUniversIcon.vue"),
        'pictureupload': () => import("./components/picture/PictureUpload.vue"),
        'univpictureupload': () => import("./components/picture/UnivPictureUpload.vue"),
        'picture-input': () => import("vue-picture-input"),
        'add-recipe': () => import("./components/picture/AddPictureRecipe.vue"),
        'add-any-picture': () => import("./components/picture/AddPicture.vue"),
        'login-modal': () => import("./components/modal/LoginModal.vue"),
        'fulltime': () => import("./components/Time.vue"),
        'preview-image': () => import("./components/picture/Preview.vue"),
        'create-recipe': () => import("./components/recipe/Create.vue"),
        'set-picture': () => import("./components/recipe/_setters/SetPicture.vue"),
        'stepsadd': () => import("./components/recipe/steps/StepsAdd"),
        'line-chart': () => import("./components/charts/LineComponent"),
        'switch-light': () => import("./components/SwitchLight.vue"),
        'drop-picture': () => import("./components/picture/DropPicturePreview"),

        'menu-element': () => import("./components/menu/DropDown.vue"),
        'mobile-menu': () => import("./components/menu/MobileMenuComponent"),
        'navigation-link': () => import("./components/menu/MobileLinkComponent"),
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
$(document).ready(function () {
    $("body").toasty();

    var easter_egg = new Konami(function () {
        $("body").toasty('pop');
    });

    if (localStorage.getItem('nightmode')) {
        document.body.classList.add('nightmode');
        document.documentElement.classList.add('nightmode');
    }
});