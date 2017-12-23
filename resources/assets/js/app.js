
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



require('./bootstrap');
require('./dropzone');

window.Vue = require('vue');


import Vue from 'vue';
import VeeValidate from 'vee-validate';
import draggable from 'vuedraggable'

Vue.use(VeeValidate);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
/*
Vue.component('example', require('./components/Example.vue'));*/


const app = new Vue({
    el: '#app',
    components: {
        draggable,
    },

    data: {
        titre: '',

        steps:[
            {
                etape : '',
            },
            {
                etape : '',
            }
        ],
        rows: [
            {
                name : '',
                qtt : '',
            },
            {
                name : '',
                qtt : '',
            },


        ],
        seen: false

    },

    methods: {
        addRow: function ($index) {
            console.log($index);
            this.rows.push({
            });
        },
        removeRow: function (index) {
            this.rows.splice(index, 1);
        },

        addStep: function () {
            this.steps.push({
            });
        },

        removeStep: function (index) {
            this.steps.splice(index, 1);
        }
    }});

$('#upload').change(function() {
    readURL(this);
    var filename = $(this).val();
    var lastIndex = filename.lastIndexOf("\\");
    if (lastIndex >= 0) {
        filename = filename.substring(lastIndex + 1);
    }
    $('#filename').val(filename);
});

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// Like system

$('.like').on("click", function (event) {
   event.preventDefault();
    var postId = event.currentTarget.attributes['data'].value;
    var verif = event.currentTarget.attributes['verif'].value;


    axios.defaults.headers.common['X-CSRF-TOKEN'] = verif;

    axios.post('/like', {
        recette: postId
    })
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            if (error.response) {
                // The request was made and the server responded with a status code
                // that falls out of the range of 2xx
                console.log(error.response.data);
                console.log(error.response.status);
                console.log(error.response.headers);
            } else if (error.request) {
                // The request was made but no response was received
                // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                // http.ClientRequest in node.js
                console.log(error.request);
            } else {
                // Something happened in setting up the request that triggered an Error
                console.log('Error', error.message);
            }
            console.log(error.config);
        });


});


// Navbar burger
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
