(function( residuos, $, undefined ) {
  //Varables
  var list = [];
  var vue;
  //bindings

  //functions
  residuos.init = function init(){
    initVue();
    getResidues();
  }

  function initVue(){
      vue = new Vue({
        el: '#app',
        data: {
          name: '',
          unit: 'kilogramos',
          submitting: false,
          loading: false,
          residues: list
        },
        methods: {
          addResidue: function () {
            var name = this.name.trim()
            var unit = this.unit;
            var that = this;
            if (name) {
              $.post('store-residue',{name: name, unit: unit},function(data){
                alert(data);
                that.name = "";
                that.unit = ""
                getResidues();
              })
              .fail(function(response){
                alert(response.responseText);
              })
            }
          },
          removeTodo: function (index) {
            this.todos.splice(index, 1)
          }
        },
        watch:{
          residues:function(){
            $.material.init();
          }
        }
      })
    }

    function getResidues(){
      $.get('get-all-residues',function(response){
        vue.residues = response;
      })
    }
}( window.residuos = window.residuos || {}, jQuery ));