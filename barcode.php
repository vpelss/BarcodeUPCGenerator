<?php
	require("barcode.inc.php");

	$encode=$_REQUEST['encode'];
	$bar= new BARCODE();

	if($bar==false)
		die($bar->error());
	// OR $bar= new BARCODE("I2O5");

	$barnumber=$_REQUEST['bdata'];
	//scriptman remove all but numbers
	//ereg_replace("[^0-9]", "", $barnumber);
	$barnumber = preg_replace("/\D/","",$barnumber);

	//$barnumber="200780";
	//$barnumber="801221905";
	//$barnumber="A40146B";
	//$barnumber="Code 128";
	//$barnumber="TEST8052";
	//$barnumber="TEST93";

	$bar->setSymblogy($encode);
	$bar->setHeight($_REQUEST['height']);
	$bar->setFont("arial");
	$bar->setScale($_REQUEST['scale']);
	$bar->setHexColor($_REQUEST['color'],$_REQUEST['bgcolor']);

	/*$bar->setSymblogy("UPC-E");
	$bar->setHeight(50);
	$bar->setFont("arial");
	$bar->setScale(2);
	$bar->setHexColor("#000000","#FFFFFF");*/

	//OR
	//$bar->setColor(255,255,255)   RGB Color
	//$bar->setBGColor(0,0,0)   RGB Color

  	//mod scriptman no file writing allowed
	//$return = $bar->genBarCode($barnumber,$_REQUEST['type'],$_REQUEST['file']);
	$return = $bar->genBarCode($barnumber,$_REQUEST['type'],"");

	if($return==false)
		$bar->error(true);

?>
