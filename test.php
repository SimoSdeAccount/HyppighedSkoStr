<?php 
/*include("Klasser/brugerskodata.php");
$readSkoData = new brugerskodata(mysqli_connect("localhost", "root", "", "skodb"));
$skoData = $readSkoData->readSko();*/
$skoData = array(39, 39, 38, 40);
$storst = $mindst = $skoData[0];
for($i = 0; $i < count($skoData); $i++)
{
    if($skoData[$i] < $mindst)
    {
        $mindst = $skoData[$i];
    }
    if($skoData[$i] > $storst)
    {
        $storst = $skoData[$i];
    }
}
$foreKomster = array();
$foreKomsterIndex = 0;
for($i = $mindst; $i <= $storst; $i++)
{
    $forekomst = 0;
    for($j = 0; $j < count($skoData); $j++)
    {
        if($skoData[$j] == $mindst)
        {
            $forekomst++;
        }
    }
    $foreKomster[$foreKomsterIndex] = array($mindst, $forekomst);
    $foreKomsterIndex++;
    $mindst++;
}
$storstHyppighed = $foreKomster[0][1];
for($i = 0; $i < count($foreKomster); $i++)
{
    for($j = 0; $j < count($foreKomster[$i]); $j++)
    {
        if($foreKomster[$i][1] > $storstHyppighed)
        {
            $storstHyppighed = $foreKomster[$i][1];
        }
    }
}
$forekomstSum = 0;
$foreKomstProcenter = array();
for($i = 0; $i < count($foreKomster); $i++)
{
    $forekomstSum += $foreKomster[$i][1];
}
for($i = 0; $i < count($foreKomster); $i++)
{
    $foreKomstProcenter[$i] = round($foreKomster[$i][1]/$forekomstSum, 3)*1000;
} 
$storstProcent = 0;
for($i = 0; $i < count($foreKomstProcenter); $i++)
{
    if($foreKomstProcenter[$i] > $storstProcent)
    {
        $storstProcent = $foreKomstProcenter[$i];
    }
}
$graphFrame = imagecreatetruecolor(600, 330);
$sort = imagecolorallocate($graphFrame, 0, 0, 0);
$hvid = imagecolorallocate($graphFrame, 255, 255, 255);
$roed = imagecolorallocate($graphFrame, 255, 153, 153);
$graa = imagecolorallocate($graphFrame, 108, 117, 126);
$font = 'C:/Windows/Fonts/arial.ttf';
$interval = (525/((count($foreKomster)*2)-1));
imagefill($graphFrame, 0, 0, $hvid);
imageline($graphFrame, 50, 300, 50, 20, $sort);
imageline($graphFrame, 50, 300, 575, 300, $sort);
$xinc = $yinc = 0;
$derp = $storstProcent/$storstHyppighed;
for($i = 0; $i < $storstHyppighed + 1; $i++)
{
    
    imageline($graphFrame, 50, 20 + $yinc, 575, 20 + $yinc, $sort);
    if($i == 0)
    {
         imagettftext($graphFrame, 14, 0, 10, 27 + $yinc, $sort, $font, round($storstProcent/10) . "%");
    }
    else 
    {
        $storstProcent = $storstProcent - $derp;
        imagettftext($graphFrame, 14, 0, 10, 27 + $yinc, $sort, $font, abs(round($storstProcent / 10)) . "%");
    }
    $yinc += 280/$storstHyppighed;
}
for($i = 0; $i < count($foreKomster); $i++)
{
    imagefilledrectangle($graphFrame, 50 + $xinc, 300, 50 + $interval + $xinc, 300-($foreKomster[$i][1]*280/$storstHyppighed), $graa);
    imagerectangle($graphFrame, 50 + $xinc, 300, 50 + $interval + $xinc, 300-($foreKomster[$i][1]*280/$storstHyppighed), $sort);
    imagettftext($graphFrame, 14, 0, 50 + $xinc, 320, $sort, $font, $foreKomster[$i][0]);
    $xinc += $interval*2;
}
header('Content-Type: image/png');
imagepng($graphFrame);
imagedestroy($graphFrame);
//hyptest
/*$storst = $mindst = $skoData[0];
for($i = 0; $i < count($skoData); $i++)
{
    if($skoData[$i] < $mindst)
    {
        $mindst = $skoData[$i];
    }
    if($skoData[$i] > $storst)
    {
        $storst = $skoData[$i];
    }
}
$foreKomster = array();
$foreKomsterIndex = 0;
for($i = $mindst; $i <= $storst; $i++)
{
    $forekomst = 0;
    for($j = 0; $j < count($skoData); $j++)
    {
        if($skoData[$j] == $mindst)
        {
            $forekomst++;
        }
    }
    $foreKomster[$foreKomsterIndex] = array($mindst, $forekomst);
    $foreKomsterIndex++;
    $mindst++;
}
$storstHyppighed = $foreKomster[0][1];
for($i = 0; $i < count($foreKomster); $i++)
{
    for($j = 0; $j < count($foreKomster[$i]); $j++)
    {
        if($foreKomster[$i][1] > $storstHyppighed)
        {
            $storstHyppighed = $foreKomster[$i][1];
        }
    }
}
$graphFrame = imagecreatetruecolor(600, 330);
$sort = imagecolorallocate($graphFrame, 0, 0, 0);
$hvid = imagecolorallocate($graphFrame, 255, 255, 255);
$roed = imagecolorallocate($graphFrame, 255, 153, 153);
$graa = imagecolorallocate($graphFrame, 108, 117, 126);
$font = 'C:/Windows/Fonts/arial.ttf';
$interval = (550/((count($foreKomster)*2)-1));
imagefill($graphFrame, 0, 0, $hvid);
imageline($graphFrame, 25, 300, 25, 20, $sort);
imageline($graphFrame, 25, 300, 575, 300, $sort);
$xinc = $yinc = 0;
for($i = 0; $i < $storstHyppighed + 1; $i++)
{
    if($i <= $storstHyppighed - 1)
    {
        imageline($graphFrame, 25, 20 + $yinc, 575, 20 + $yinc, $sort);
        imagettftext($graphFrame, 14, 0, 10, 27 + $yinc, $sort, $font, $storstHyppighed-$i);
        $yinc += 280/$storstHyppighed;
    }
    else 
    {
        imagettftext($graphFrame, 14, 0, 10, 27 + $yinc, $sort, $font, 0);
    }
}
for($i = 0; $i < count($foreKomster); $i++)
{
    imagefilledrectangle($graphFrame, 25 + $xinc, 300, 25 + $interval + $xinc, 300-($foreKomster[$i][1]*(280/$storstHyppighed)), $graa);
    imagerectangle($graphFrame, 25 + $xinc, 300, 25 + $interval + $xinc, 300-($foreKomster[$i][1]*(280/$storstHyppighed)), $sort);
    imagettftext($graphFrame, 14, 0, 25 + $xinc, 320, $sort, $font, $foreKomster[$i][0]);
    $xinc += $interval*2;
}
header('Content-Type: image/png');
imagepng($graphFrame);
imagedestroy($graphFrame);*/
?>