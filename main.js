//Combo 1
$(document).ready(function(){
    $('#tabla').change(function(){
        //Selected value
        var inputValue = $(this).val();
        //Ajax for calling php function
        $.post('combo1.php', { dropdownValue: inputValue }, function(data){
            $("select.combo1").html("<option value=''>Seleccione una opción</option>"+data);
            //do after submission operation in DOM
        });
    });
    $('#combo1').change(function(){
        //Selected value
        var inputValue = $('#tabla').val();
        var inputValue2 = $(this).val();
        //Ajax for calling php function
        $.post('combo2.php', { dropdownValue: inputValue, modelo: inputValue2 }, function(data){
            $("select.combo2").html("<option value=''>Seleccione una opción</option>"+data);
            //do after submission operation in DOM
        });
    });
    $("button.vista").click(function(e){
        var tabla=$('#tabla').val();
        var campo1=$('#combo1').val();
        var campo2=$('#combo2').val();
        $.post('vista.php', { tabla1: tabla, combo1: campo1, combo2: campo2}, function(data){
            $("label.salida").html(data);
            //do after submission operation in DOM
        });
        
   
  });
  $("button.conjunta").click(function(event){
    var campo1=$('#campo1').val();
    var campo2=$('#campo2').val();
    $.post('conjunta.php', {combo1: campo1, combo2: campo2}, function(data){
        $("div.resultado").html(data);

        //do after submission operation in DOM
    });
    event.preventDefault();
  });
  $("button.cvista").click(function(e){
    var tabla=$('#tabla').val();
    var campo1=$('#combo1').val();
    var campo2=$('#combo2').val();
    $.post('vista.php', { tabla1: tabla, combo1: campo1, combo2: campo2}, function(data){
        $("label.salida").html(data);
        //do after submission operation in DOM
    });
    e.preventDefault();

});
});

