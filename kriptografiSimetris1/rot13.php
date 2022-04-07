<?php
$rot=13;
$plain="ABCDEFGHIJK abcdef APA KABAR 12345";

$chipper=str_rot($plain,$rot);
$dekrip=str_rot2($chipper,$rot);

echo"plain: $plain<hr>";
echo"chipper: $chipper<hr>";
echo"dekrip: $dekrip<hr>";

function str_rot($string,$rot){
    if(!is_string($string)) return false; 
    for ($i = 0, $j = strlen( $string); $i < $j; $i++){
        $char=ord($string[$i])+$rot;
        $char=$char>256?$char-256:$char;
        $string[$i]=chr($char); 
    }
    return $string;
}


function str_rot2($string,$rot){
    if(!is_string($string)) return false; 
    for ($i = 0, $j = strlen( $string); $i < $j; $i++){
        $char=ord($string[$i])-$rot;
        $char=$char>256?$char-256:$char;
        $string[$i]=chr($char); 
    }
    return $string;
}


for ($i=0;$i<=1000;$i++){
	echo "$i = ".chr($i)."<br>";
	}

?>