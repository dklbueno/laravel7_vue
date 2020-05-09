<template>
    <div :class="'col-sm-' + (sm || '6') + ' col-md-' + (md || '4')">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://coletiva.net/files/e4da3b7fbbce2345d7772b0674a318d5/midia_foto/20170713/118815-maior_artigo_jul17.jpg" alt="Card image cap">
            <div class="card-body">
                <small>{{data | formataData}} - {{autor}}</small>
                <h5 class="card-title">{{titulo}}</h5>
                <p class="card-text">{{descricao}}</p>
                <a :href="link" class="btn btn-primary">Leia mais</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['titulo','descricao','link','imagem','data','autor','sm','md'],
        // filters: {
        //     formataData: function(valor){
        //         valor = valor.toString();
        //         if(valor.match(/^\d{4}([./-])\d{2}\1\d{2}$/)) {
        //             valor = valor.replace(/-/g,'');
        //             valor = valor.substring(6)+'/'+valor.substring(4,6)+'/'+valor.substring(0,4);
        //         }
        //         return (valor?valor:'');
        //     }
        // }
    }
</script>
