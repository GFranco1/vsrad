<?php
/**
 * Created by PhpStorm.
 * User: Pove67
 * Date: 04/03/2017
 * Time: 12:51
 */

$password =array();
$longitud = 8;

//Función para seleccionar de forma aletoria una letra o número del array alfanumerico para poder generar la contraseña temporal.
function Generar_Bit(){
    //Array alfanumerico
    $alfanumerico = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','z',1,2,3,4,5,6,7,8,9,0);
    //Generar número aleatorio
    $random = random_int(0,33);
    $bit = $alfanumerico[$random];
    //Generar número aleatorio entre 0 o 1 para convertir una letra en mayúscula si es 1.
    $MinMay = random_int(0,1);
    //Comprobamos si es string
    if(is_string($bit) && $MinMay == 1 ){
            //Strtoupper función para convertir una cadena en mayúsculas
            $bit = strtoupper($bit);
    }
    return $bit;
}

for($i=0;$i<$longitud;$i++){
    $bit = Generar_Bit();
    //Insertamos en la ultima posición del array el bit devuelto por la función.
    array_push($password,$bit);
}


/*
//Este foreach es para imprimir.
foreach($password as $bit){
    echo "$bit";
}*/










