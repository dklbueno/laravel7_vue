<template>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li v-if="lista"
                v-bind:class="!!item.url ? 'breadcrumb-item' : 'breadcrumb-item active'"
                :aria-current="!! item.url ? 'page' : false "
                v-for="item in lista">
                <a v-if="item.url" v-bind:href="item.url">{{item.titulo}}</a>
                <span v-if="!item.url">{{item.titulo}}</span>
            </li>
        </ol>
    </nav>
</template>

<script>
    export default {
        props: ['lista']        
    }
</script>
