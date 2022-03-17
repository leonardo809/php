//Combo 1
$(document).ready(function(){
   
  $("button.cvista").click(function(e){
    var tabla=$('#tabla').val();
    var campo1=$('#combo1').val();
    var campo2=$('#combo2').val();
    var condi=$('#condi').val();
    $.post('cccvista.php', { tabla1: tabla, combo1: campo1, combo2: campo2, condi: condi}, function(data){
        $("label.salida").html(data);
        //do after submission operation in DOM
    });
    e.preventDefault();

});
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
});
