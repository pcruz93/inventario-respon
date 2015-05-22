function tipouser(ele){
switch (ele){

        case 'A': 
        $('#usuario').css('display','inline-block');
$('#empresa').css('display','inline-block');
        break;
case 'U':
$('#usuario').css('display','none');
$('#empresa').css('display','none');
        break;
}
}