<template>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li v-if="lista" v-bind:class="defineClass" :aria-current="defineAreaCurrent" v-for="item in lista">
                <a v-if="item.url" v-bind:href="item.url">{{item.titulo}}</a>
                <span v-if="!item.url">{{item.titulo}}</span>
            </li>
        </ol>
    </nav>
</template>

<script>
    export default {
        props: ['lista'],
        computed: {
            defineClass: function() {
                return "breadcrumb-item" + (this.url?"":" active");
            },
            defineAreaCurrent: function() {
                if(!this.url){
                    return "page";
                }
            }
        }
    }
</script>
