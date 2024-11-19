<?php
error_reporting(E_ALL);
ini_set('display_errors',TRUE);

function parseToXML($htmlStr)	{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			header("Content-type: text/xml");
	echo '<markers>';
				  echo '<marker ';
				  echo 'id="1" ';
				  echo 'name="Universidad Carolina" ';
				  echo 'address="' . parseToXML("Calzada Antonio Narro") . '" ';
				  echo 'telefono="' . parseToXML("8445689565") . '" ';
				  echo 'descripcion="'. parseToXML("Inscripciones Abiertas") . '" ';
				  echo 'lat="25.416232" ';
				  echo 'lng="-101.007559" ';
				  echo 'image="0" ';
				  echo 'timetoplace="0" ';
				  echo 'type="featured" ';
				  echo '/>';	
	echo '</markers>';	
?>