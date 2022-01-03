<?

function getvar($name){
    global $_GET, $_POST;
    if (isset($_GET[$name])) return $_GET[$name];
    else if (isset($_POST[$name])) return $_POST[$name];
    else return false;
}

if (get_magic_quotes_gpc()){
    $bdata=stripslashes(getvar('bdata'));
} else {
    $bdata=getvar('bdata');
}
if (!$bdata) $bdata='123456789012';
?>

<?php @ob_start();
$encode="UPC-A";
$bdata="123456789012";
$height="50";
$scale="2";
$bgcolor="#FFFFFF";
$color="#000000";
$file="";
$type="png";

//$_POST['Genrate'] = 'yes';

//if(isset($_POST['Genrate']))
{
        if (getvar('encode')) $encode=getvar(encode);
        if (getvar('bdata')) $bdata=getvar(bdata);
        if (getvar('height')) $height=getvar(height);
        if (getvar('scale')) $scale=getvar(scale);
        if (getvar('bgcolor')) $bgcolor=getvar(bgcolor);
        if (getvar('color')) $color=getvar(color);
        if (getvar('file')) $file=getvar(file);
        if (getvar('type')) $type=getvar(type);
}

?>
<HTML>
<HEAD>
<TITLE>Barcode Image Generator</TITLE>
<STYLE>
<!--

body,td{
        font-family:verdana;
        font-size:12px;
        font-weight:normal;
        color:#000066;
}
input {
        border:1px solid #336699;
}
.note{
        font-size:10px;
        color:#CC0000;
}
-->
</STYLE>
</HEAD>

<BODY>
<SCRIPT LANGUAGE="JavaScript" SRC="checkcode.js"></SCRIPT>

<center>
<a href="/"><img src="http://www.somewhereincanada.com/sites/default/files/steve2.jpg">
</a>
</center>

<P></P>

<center>
<TABLE style='border:1px solid #330066'>
<TR>

        <TD>
        <TABLE style='border:1px solid #990000'>
        <form action='' method='GET'>
        <TR>
                <TD><B>Select Encoding</B></TD>
                <TD>:</TD>
                <TD><SELECT NAME="encode">
                <OPTION value='UPC-A' <?=$encode=='UPC-A'?'selected':''?>>UPC-A (12 digits)</OPTION>
                <OPTION value='EAN-13' <?=$encode=='EAN-13'?'selected':''?>>EAN-13</OPTION>
                <OPTION value='EAN-8' <?=$encode=='EAN-8'?'selected':''?>>EAN-8</OPTION>
                <OPTION value='UPC-E' <?=$encode=='UPC-E'?'selected':''?>>UPC-E (8 digits)</OPTION>
                <OPTION value='S205' <?=$encode=='S205'?'selected':''?>>STANDARD 2 OF 5</OPTION>
                <OPTION value='I2O5' <?=$encode=='I2O5'?'selected':''?>>INDUSTRIAL 2 OF 5</OPTION>
                <OPTION value='I25' <?=$encode=='I25'?'selected':''?>>INTERLEAVED</OPTION>
                <OPTION value='POSTNET' <?=$encode=='POSTNET'?'selected':''?>>POSTNET</OPTION>
                <OPTION value='CODABAR' <?=$encode=='CODABAR'?'selected':''?>>CODABAR</OPTION>
                <OPTION value='CODE128' <?=$encode=='CODE128'?'selected':''?>>CODE128</OPTION>
                <OPTION value='CODE39' <?=$encode=='CODE39'?'selected':''?>>CODE39</OPTION>
                <OPTION value='CODE93' <?=$encode=='CODE93'?'selected':''?>>CODE93</OPTION>
                </SELECT></TD>
        </TR>
        <TR>
                <TD><B>Barcode Data</B></TD>
                <TD>:</TD>
                <TD><input name='bdata' ID='bdata' value='<?=$bdata?>'></TD>
        </TR>
        <TR>
                <TD><B>Barcode Height</B></TD>
                <TD>:</TD>
                <TD><input name='height' value='<?=$height?>'></TD>
        </TR>
        <TR>
                <TD><B>Scale</B></TD>
                <TD>:</TD>
                <TD><input name='scale' value='<?=$scale?>'></TD>
        </TR>
        <TR>
                <TD><B>Background Color</B></TD>
                <TD>:</TD>
                <TD><input name='bgcolor' value='<?=$bgcolor?>'></TD>
        </TR>
        <TR>
                <TD><B>Bar Color</B></TD>
                <TD>:</TD>
                <TD><input name='color' value='<?=$color?>'></TD>
        </TR>
        <TR>
                <!--<TD><B>File Name</B><span class='note'>*</span></TD>
                <TD>:</TD>
                <TD><input name='file' size=9 value='<?=$file?>'>-->
                <td></td><TD align="right">
                                <SELECT NAME="type">
                <option value='png'>PNG</option>
                <option value='gif'>GIF</option>
                <option value='jpg'>JPEG</option>
                </SELECT>
                </TD>
        </TR>
        <TR>
                <TD align='center' colspan=3>
                <input type="submit" name='Genrate' value='Submit'>
                </TD>
        </TR>
        <TR>
                <TD align='left' colspan=3 class='note'>
                <!--* Give file name if you want to save the barcode <br>else leave blank.-->
                </TD>
        </TR>
        </form>
        </TABLE>
        </TD>
        <TD height="100%"><TABLE style='border:1px solid #336666;width:300px;height:100%;'>
        <TR>
                <TD align='center'>
                <?php
                $qstr = 'bdata=' . $bdata . '&encode=' . $encode . '&height=' . $height . '&scale=' . $scale . '&bgcolor=' . urlencode($bgcolor) . '&color=' . urlencode($color) . '&type=' . $type;
                echo "<img src='barcode.php?$qstr'>";
                ?>

</br>
<SCRIPT LANGUAGE="JavaScript">
//check bar code ensure checksum is good!
thenum = document.getElementById('bdata').value;
checkcode(thenum);
</script>

                </TD>
        </TR>
        </TABLE></TD>
</TR>
</TABLE>
</center>

<P align="center"><A HREF="https://www.emogic.com" target="_blank">Barcode Image Generator by Emogic</A></P>

</BODY>
</HTML>