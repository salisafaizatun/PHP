<?php
$rot=13;
$plaintex="KRIPTOGRAFI";
 
echo "<b>Proses Enkrip ROT $rot</b><hr>";
cetak("Plaintext",$plaintex);
cetak("Rot",$rot);
$chipper=str_rot($plaintex,$rot);
cetak("Chipper",$chipper);

echo "<b>Proses Dekrip ROT $rot</b><br>";
$dekrip=str_rot2($chipper,$rot);
cetak("Dekrip",$dekrip); 

function str_rot($string,$rot){
    if(!is_string($string)) return false; 
    for ($i = 0, $j = strlen( $string); $i < $j; $i++){
		$num=ord($string[$i]);
        $char=$num+$rot;
        $char=$char>256?$char-256:$char;
		$Out=chr($char);
        $string[$i]=$Out; 
		echo "$i. $string[$i]= = ($num + $rot) % 256 = $char => $Out<br>";
    }
    return $string;
}


function str_rot2($string,$rot){
    if(!is_string($string)) return false; 
    for ($i = 0, $j = strlen( $string); $i < $j; $i++){
		$num=$string[$i];
        $char=ord($num)-$rot;
        $char=$char>256?$char-256:$char;
        $Out=chr($char);
        $string[$i]=$Out; 
		echo "$i. $string[$i]= = ($num - $rot) % 256 = $char => $Out<br>";
    }
    return $string;
}
  
function cetak($item, $value){
	$p=strlen($value);
	echo "$item : $value ($p chr)<hr>";
}
?>