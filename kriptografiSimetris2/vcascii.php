<?php
$plaintex="KRIPTOGRAFI";
$key="PIZZA";
cetak("Plaintext",$plaintex);
cetak("Key",$plaintex);

$pp=strlen($plaintex);
$pk=strlen($key);
$itr=ceil($pp/$pk);
$nkey="";
for($i=0;$i<$itr;$i++){
	$nkey.=$key;
}
$nkey=substr($nkey,0,$pp);
cetak("New Key",$nkey);
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
	echo "$i. $arp[$i] + $ark[$i] = ($p + $k) - $KONST = $h => $hrf<br>";
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
	echo "$i. $arc[$i] - $ark[$i] = ($c - $k) + $KONST = $h => $hrf<br>";
	$dekrip.=$hrf;
}
cetak("dekrip",$dekrip);

 
function cetak($item, $value){
	$p=strlen($value);
	echo "$item : $value ($p chr)<hr>";
}
?>

