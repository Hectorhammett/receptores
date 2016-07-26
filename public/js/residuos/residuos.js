(function( residuos, $, undefined ) {
  //Varables
  var list = [];
  var vue;
  //bindings

  //functions
  residuos.init = function init(){
    initVue();
  }

  residuos.addToList = function(element){
    list.push(element);
  }

  residuos.getList = function(){
    console.log(list);
  }

  function initVue(){
      vue = new Vue({
        el: '#app',
        data: {
          name: '',
          unit: 'kilogramos',
          residues: list,
          submitting: false,
          loading: false,
        },
        methods: {
          addResidue: function () {
            var name = this.name.trim()
            var unit = this.unit;
            if (name) {
              this.residues.push({ name: name, unit: unit })
              this.name = ''
              this.unit = "kilogramos"
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
      $.get('residues',function(){

      })
    }
}( window.residuos = window.residuos || {}, jQuery ));