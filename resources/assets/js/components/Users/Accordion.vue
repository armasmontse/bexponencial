<template>
    <div class="accordion">
        <div class="collapsible-header" v-on:click="toggle">
            <slot name="header"></slot>

            <svg class="arrow arrow-icon" v-bind:class="{ rotate: show }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.41 9.21">
                <defs></defs>
                <title>arrow</title>
                <g id="Capa_2" data-name="Capa 2">
                    <g id="Layer_1" data-name="Layer 1">
                        <polyline class="cls-1" points="1.5 1.5 7.71 7.71 13.91 1.5"/>
                    </g>
                </g>
            </svg>

        </div>
        <transition name="accordion"
        v-on:before-enter="beforeEnter" v-on:enter="enter"
        v-on:before-leave="beforeLeave" v-on:leave="leave">
            <div class="collapsible-body body" v-show="show">
                <slot ></slot>
            </div>
        </transition>
    </div>
</template>
<script>
export default{
    props: [
        'isAccesible',
    ],
    data() {
        return {
            show: false
        };
    },

    methods: {
        toggle: function() {
            if(this.isAccesible){
            this.show = !this.show;
        }
    },
        // enter: function(el, done) {
        //   $(el).slideDown(150, done);
        // },
        // leave: function(el, done) {
        //   $(el).slideUp(150, done);
        // },
        beforeEnter: function(el) {
            el.style.height = '0';
        },
        enter: function(el) {
            el.style.height = el.scrollHeight + 'px';
        },
        beforeLeave: function(el) {
            el.style.height = el.scrollHeight + 'px';
        },
        leave: function(el) {
            el.style.height = '0';
        }
    }
}
</script>
