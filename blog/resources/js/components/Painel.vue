<template>
    <div v-bind:class="defineCor">
        <div class="card-header">{{titulo}}</div>

        <div class="card-body">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props:['titulo','cor'],
        computed:{
            defineCor: function(){
                return "card " + (this.cor?this.cor:"default");
            }
        }
    }
</script>

<style media="screen">
  .blue {
    border-color: #0d4a96;
  }

  .blue > .card-header {
    color: #f7f7f7;
    background-color: #0d4a96;
    border-color: #0d4a96;
  }

  .orange {
    border-color: #e85e0d;
  }

  .orange > .card-header {
    color: #f7f7f7;
    background-color: #e85e0d;
    border-color: #e85e0d;
  }
</style>
