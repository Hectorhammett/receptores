//global variables

var table;
var field;
var timer;

//Init function
$(document).ready(function(){
  var id = $('input[name="scraperId"]').val();
  table = initTable(id);
  field = $("#last-entry");
  startTimer(table);
});

//handlers
$(document).on('click','#btn-refresh',function(){
  table.ajax.reload();
  field.text(table.row(0).data().Edited + '');
});

$(document).on('click','#btn-toggle',function(){
  if(this.checked)
    startTimer(table);
  else
    clearInterval(timer);
});

$(document).on('click',".paginate_button",function(){
  if($("#btn-toggle")[0].checked){
    $("#btn-toggle").click();
  }
});

//functions
function initTable(id){
  var table = $("table").DataTable({
    serverSide: true,
    processing: true,
    pageLength: 25,
    ajax:{// dom: '<"toolbar">frtip',
      url: '../table/' + id,
    },
    "columns": [
      { "data": "Message" },
      { "data": "Edited" },
    ]
  });
  $('#DataTables_Table_0_filter').prepend('<div class="togglebutton inline-block" id="toggleholder">'+
      '<label>'+
        '<input type="checkbox" checked="" id="btn-toggle">'+
        'Autorefresh'+
      '</label>'+
    '</div>' + '<button class="btn btn-primary btn-raised margin-left-15 margin-right-15" id="btn-refresh">Refresh</button>');
  $("#DataTables_Table_0_length").css("padding-top","15px");
  $.material.togglebutton();
  $.material.ripples();
  return table;
}

function startTimer(table){
  timer = setInterval(function(){
    table.ajax.reload();
    field.text(table.row(0).data().Edited + '');
  },5000);
}
