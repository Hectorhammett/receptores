$(document).ready(function(){
  notifyStyle();
  startEditables();
});

//form handling
$(".edit-scraper").submit(function(e){
  var $form = $(this);
  var $button = $("button[type='submit']",this);
  e.preventDefault();
  e.stopImmediatePropagation();
  $button[0].disabled = true;
  $.post($form.attr('action'),$form.serialize(),function(data){
    $.notify(data,"success");
    getStatus();
  })
  .fail(function(data){
    console.log(data.responseText);
    $.notify("There was an error processing your request. Please try again.","error");
  })
  .always(function(){
    $button[0].disabled = false;
  });
});

$(".switch-activate").click(function(e){
  e.stopPropagation();
  e.stopImmediatePropagation();
  var activate = this;
  $.post("activateScraper/" + $(this).attr("data-id"),{activate:this.checked},function(data){
    $.notify(data,"success");
    getStatus();
  })
  .fail(function(data){
    $.notify("There was an error processing your request. Please try again","error");
    activate.checked = !activate.checked;
  });
});

// functions
function notifyStyle(){
  $.notify.defaults({
         showAnimation: 'fadeIn',
         hideAnimation: 'fadeOut',
       });
       $.notify.addStyle("bootstrap", {
     html: '<div>\n<i class="material-icons" style="margin-right:7px;vertical-align:bottom">error</i><span data-notify-text></span>\n</div>',
     classes: {
       base: {
         "font-size":"14px",
         "padding": "12px 13px",
         "background-color": "#fcf8e3",
         "border": "none",
         "border-radius": "1px",
         "background-repeat": "no-repeat",
         "background-position": "3px 10px",
         "box-shadow": "0 0 8px rgba(0, 0, 0, 0.18), 0 8px 16px rgba(0, 0, 0, 0.36)"
       },
       error: {
         "color":"#ffffff",
         "background-color": "#F44336",
         "border-color": "#EED3D7",
       },
       success: {
         "color": "#ffffff",
         "background-color": "#4caf50",
       },
       info: {
         "color": "#3A87AD",
         "background-color": "#D9EDF7",
         "border-color": "#BCE8F1",
         "background-image": "url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QYFAhkSsdes/QAAA8dJREFUOMvVlGtMW2UYx//POaWHXg6lLaW0ypAtw1UCgbniNOLcVOLmAjHZolOYlxmTGXVZdAnRfXQm+7SoU4mXaOaiZsEpC9FkiQs6Z6bdCnNYruM6KNBw6YWewzl9z+sHImEWv+vz7XmT95f/+3/+7wP814v+efDOV3/SoX3lHAA+6ODeUFfMfjOWMADgdk+eEKz0pF7aQdMAcOKLLjrcVMVX3xdWN29/GhYP7SvnP0cWfS8caSkfHZsPE9Fgnt02JNutQ0QYHB2dDz9/pKX8QjjuO9xUxd/66HdxTeCHZ3rojQObGQBcuNjfplkD3b19Y/6MrimSaKgSMmpGU5WevmE/swa6Oy73tQHA0Rdr2Mmv/6A1n9w9suQ7097Z9lM4FlTgTDrzZTu4StXVfpiI48rVcUDM5cmEksrFnHxfpTtU/3BFQzCQF/2bYVoNbH7zmItbSoMj40JSzmMyX5qDvriA7QdrIIpA+3cdsMpu0nXI8cV0MtKXCPZev+gCEM1S2NHPvWfP/hL+7FSr3+0p5RBEyhEN5JCKYr8XnASMT0xBNyzQGQeI8fjsGD39RMPk7se2bd5ZtTyoFYXftF6y37gx7NeUtJJOTFlAHDZLDuILU3j3+H5oOrD3yWbIztugaAzgnBKJuBLpGfQrS8wO4FZgV+c1IxaLgWVU0tMLEETCos4xMzEIv9cJXQcyagIwigDGwJgOAtHAwAhisQUjy0ORGERiELgG4iakkzo4MYAxcM5hAMi1WWG1yYCJIcMUaBkVRLdGeSU2995TLWzcUAzONJ7J6FBVBYIggMzmFbvdBV44Corg8vjhzC+EJEl8U1kJtgYrhCzgc/vvTwXKSib1paRFVRVORDAJAsw5FuTaJEhWM2SHB3mOAlhkNxwuLzeJsGwqWzf5TFNdKgtY5qHp6ZFf67Y/sAVadCaVY5YACDDb3Oi4NIjLnWMw2QthCBIsVhsUTU9tvXsjeq9+X1d75/KEs4LNOfcdf/+HthMnvwxOD0wmHaXr7ZItn2wuH2SnBzbZAbPJwpPx+VQuzcm7dgRCB57a1uBzUDRL4bfnI0RE0eaXd9W89mpjqHZnUI5Hh2l2dkZZUhOqpi2qSmpOmZ64Tuu9qlz/SEXo6MEHa3wOip46F1n7633eekV8ds8Wxjn37Wl63VVa+ej5oeEZ/82ZBETJjpJ1Rbij2D3Z/1trXUvLsblCK0XfOx0SX2kMsn9dX+d+7Kf6h8o4AIykuffjT8L20LU+w4AZd5VvEPY+XpWqLV327HR7DzXuDnD8r+ovkBehJ8i+y8YAAAAASUVORK5CYII=)"
       },
       warn: {
         "color": "#C09853",
         "background-color": "#FCF8E3",
         "border-color": "#FBEED5",
         "background-image": "url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAABJlBMVEXr6eb/2oD/wi7/xjr/0mP/ykf/tQD/vBj/3o7/uQ//vyL/twebhgD/4pzX1K3z8e349vK6tHCilCWbiQymn0jGworr6dXQza3HxcKkn1vWvV/5uRfk4dXZ1bD18+/52YebiAmyr5S9mhCzrWq5t6ufjRH54aLs0oS+qD751XqPhAybhwXsujG3sm+Zk0PTwG6Shg+PhhObhwOPgQL4zV2nlyrf27uLfgCPhRHu7OmLgAafkyiWkD3l49ibiAfTs0C+lgCniwD4sgDJxqOilzDWowWFfAH08uebig6qpFHBvH/aw26FfQTQzsvy8OyEfz20r3jAvaKbhgG9q0nc2LbZxXanoUu/u5WSggCtp1anpJKdmFz/zlX/1nGJiYmuq5Dx7+sAAADoPUZSAAAAAXRSTlMAQObYZgAAAAFiS0dEAIgFHUgAAAAJcEhZcwAACxMAAAsTAQCanBgAAAAHdElNRQfdBgUBGhh4aah5AAAAlklEQVQY02NgoBIIE8EUcwn1FkIXM1Tj5dDUQhPU502Mi7XXQxGz5uVIjGOJUUUW81HnYEyMi2HVcUOICQZzMMYmxrEyMylJwgUt5BljWRLjmJm4pI1hYp5SQLGYxDgmLnZOVxuooClIDKgXKMbN5ggV1ACLJcaBxNgcoiGCBiZwdWxOETBDrTyEFey0jYJ4eHjMGWgEAIpRFRCUt08qAAAAAElFTkSuQmCC)"
       }
     }
   });
}

function startEditables(){
  $.fn.editable.defaults.mode = 'inline';
  $('.editable').editable({
    error:function(response){
      $.notify(response.responseText,"error");
    },
    success:function(response){
      $.notify(response,"success");
      $.get("refreshSidebar",function(data){
        $("#sidebar-app").replaceWith(data);
      });
    }
  });
}
