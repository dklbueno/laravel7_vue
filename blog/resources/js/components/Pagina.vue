<template>
<div class="container">
      <div class="row">
          <div v-bind:class="defineTamanho">
              <slot></slot>
          </div>
      </div>
  </div>
</template>
<script>
    export default {
        props:['tamanho'],
        computed:{
            defineTamanho: function(){
                if(this.tamanho >= 12){
                    return "col-md-12";
                }
                if(this.tamanho <= 2){
                    return "col-md-2 offset-md-5";
                }
                if(this.tamanho % 2 > 0){
                    this.tamanho ++;
                }
                return "col-md-"+this.tamanho+" offset-md-"+(12-this.tamanho)/2;
            }
        }
    }
</script>