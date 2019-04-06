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

import TypeUniversIcon from "./components/elements/Icons/TypeUniversIcon.vue";
import PictureUpload from "./components/picture/PictureUpload.vue";
import UnivPictureUpload from "./components/picture/UnivPictureUpload.vue";
import AddPictureRecipe from "./components/picture/AddPictureRecipe.vue";
import AddPicture from "./components/picture/AddPicture.vue";
import ImagePicture from "./components/picture/Preview.vue";

import Time from "./components/Time.vue";

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
                            'add-any-picture': AddPicture,
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