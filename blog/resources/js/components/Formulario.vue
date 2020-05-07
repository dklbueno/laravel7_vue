<template>
    <form v-bind:class="css" v-bind:action="action" v-bind:method="defineMethod" v-bind:enctype="enctype">
        <input v-if="token" type="hidden" name="_token" v-bind:value="token">
        <input v-if="alterMethod" type="hidden" name="_method" v-bind:value="alterMethod">

        <slot></slot>
        
    </form>
</template>

<script>
    import CKEditor from '@ckeditor/ckeditor5-vue';
    import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

    export default {
        components: {
            Ckeditor: CKEditor,
        },
        props: ['css','action','method','enctype','token'],

        computed: {
            defineMethod: function() {
                if(this.method.toLowerCase() == 'post' || this.method.toLowerCase() == 'get') {
                    return this.method.toLowerCase();
                }

                if(this.method.toLowerCase() == 'put' || this.method.toLowerCase() == 'delete') {
                    this.alterMethod = this.method.toLowerCase();
                }

                return 'post';
            }
        },
        data() {
            return {
                alterMethod:"",
                editor: ClassicEditor
            }
        }
    }
</script>
