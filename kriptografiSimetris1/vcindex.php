<?php
$abjad="ABCDEFGHIJKLMNOPQRSTUVWXYZ abcdefghijklmnopqrstuvwxyz1234567890";
$KONST=strlen($abjad);
$plaintex="serbu Berli agar Berlinangan dosanya hilang";
//$plaintex=strtoupper($plaintex);
$key="pizza";
//$key=strtoupper($key);

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

$chipper="";
for($i=0;$i<count($arp);$i++){
	//$p=ord($arp[$i]);
	//$k=ord($ark[$i]);
	$p=cekIndex($abjad,$arp[$i]);
	$k=cekIndex($abjad,$ark[$i]);
	$h=($p+$k)%$KONST;
	//$hrf=chr($h);
	$hrf=setAbjad($abjad,$h);
	echo "$i. $arp[$i] + $ark[$i] = ($p + $k) % $KONST = $h => $hrf<br>";
	$chipper.=$hrf;
}
cetak("Chipper",$chipper);
//=================================
$arc=str_split($chipper);
$dekrip="";
for($i=0;$i<count($arc);$i++){
	$c=cekIndex($abjad,$arc[$i]);
	$k=cekIndex($abjad,$ark[$i]);
	$h=(($c-$k) + $KONST) %$KONST;
	$hrf=setAbjad($abjad,$h);
	echo "$i. $arc[$i] - $ark[$i] = (($c-$k) + $KONST) %$KONST = $h => $hrf<br>";
	$dekrip.=$hrf;
}
cetak("dekrip",$dekrip);

function cekIndex($abjad,$cari){
	$hsl="";
	$ar=str_split($abjad);
	for($i=0;$i<count($ar);$i++){
		if($cari==$ar[$i]){
			$index=$i;
			break;
		}
	}
	$index=$index;
	return $index;
} 
function setAbjad($abjad,$index){
	$index=$index;
	$ar=str_split($abjad); 
	return $ar[$index];
}
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

