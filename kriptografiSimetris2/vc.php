<?php
$plaintex="HALO APA KABAR SELAMAT PAGI INDONESIA 123456789 !!!";
$key="123ACDG";

cetak("Plaintext",$plaintex);

$pp=strlen($plaintex);
$pk=strlen($key);
$itr=ceil($pp/$pk);
$nkey="";
for($i=0;$i<$itr;$i++){
	$nkey.=$key;
}
$nkey=substr($nkey,0,$pp);
cetak("NPassword",$nkey);
//===========================

$arp=str_split($plaintex);
$ark=str_split($nkey);

$KONST=65;

$chipper="";
for($i=0;$i<count($arp);$i++){
	$p=ord($arp[$i]);
	$k=ord($ark[$i]);
	$h=($p+$k)-$KONST;
	$hrf=chr($h);
	//echo "$i. $arp[$i] + $ark[$i] = $p + $k - $KONST = $h => $hrf<br>";
	$chipper.=$hrf;
}
cetak("Chipper",$chipper);
//=================================
$arc=str_split($chipper);
$dekrip="";
for($i=0;$i<count($arc);$i++){
	$c=ord($arc[$i]);
	$k=ord($ark[$i]);
	$h=($c-$k)+$KONST;
	$hrf=chr($h);
	echo "$i. $arc[$i] - $ark[$i] = $c - $k + $KONST = $h => $hrf<br>";
	$dekrip.=$hrf;
}
cetak("dekrip",$dekrip);

 
 
function toASCII($kalimat){
	$hsl="";
	$ar=str_split($kalimat);
	for($i=0;$i<count($ar);$i++){
		$char=ord($ar[$i]);
		echo "$i. $ar[$i]= $char<br>";
		$hsl.=$char."-";
	}
	return $hsl;
}

function cetak($item, $value){
	$p=strlen($value);
	echo "<hr>$item : $value ($p chr)<br>";
}
?>

