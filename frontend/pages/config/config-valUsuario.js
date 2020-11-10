var usu = document.getElementById('usuario');
var pas = document.getElementById('password');
var flag= false;

function Resultadoasd(){
    if (usu.value === null || usu.value === ''){
        alert('Ingrese usuario');
        flag=false;
    }else{
        if (pas.value === null || pas.value === ''){
            alert('Ingrese password');
            flag=false;}
    }
    return flag;
}

