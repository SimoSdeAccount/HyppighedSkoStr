<?php
class grafdanner 
{
    public function __construct($con) 
    {
        include("brugerskodata.php");
        $readSkoData = new brugerskodata($con);
        $this->data = $readSkoData->readSko();
    }
    
    private $data;
    private $storst;
    private $mindst;
    private $foreKomster = array();
    private $storstHyppighed;
    private $storstProcent;
    
    private function setStorstMindst() {
        $this->storst = $this->mindst = $this->data[0];
        for($i = 0; $i < count($this->data); $i++)
        {
            if($this->data[$i] < $this->mindst)
            {
                $this->mindst = $this->data[$i];
            }
            if($this->data[$i] > $this->storst)
            {
                $this->storst = $this->data[$i];
            }
        }
    }
    private function setForekomster() 
    {
        $this->setStorstMindst();
        $foreKomsterIndex = 0;
        for($i = $this->mindst; $i <= $this->storst; $i++)
        {
            $forekomst = 0;
            for($j = 0; $j < count($this->data); $j++)
            {
                if($this->data[$j] == $this->mindst)
                {
                    $forekomst++;
                }
            }
            $this->foreKomster[$foreKomsterIndex] = array($this->mindst, $forekomst);
            $foreKomsterIndex++;
            $this->mindst++;
        }
    }
    private function setStorstHyppighed() 
    {
        $this->setForekomster();
        $this->storstHyppighed = $this->foreKomster[0][1];
        for($i = 0; $i < count($this->foreKomster); $i++)
        {
            for($j = 0; $j < count($this->foreKomster[$i]); $j++)
            {
                if($this->foreKomster[$i][1] > $this->storstHyppighed)
                {
                    $this->storstHyppighed = $this->foreKomster[$i][1];
                }
            }
        }
    }
    private function setStorstProcent() 
    {
        $forekomstSum = 0;
        $foreKomstProcenter = array();
        for($i = 0; $i < count($this->foreKomster); $i++)
        {
            $forekomstSum += $this->foreKomster[$i][1];
        }
        for($i = 0; $i < count($this->foreKomster); $i++)
        {
            $foreKomstProcenter[$i] = round($this->foreKomster[$i][1]/$forekomstSum, 3)*1000;
        } 
        $this->storstProcent = 0;
        for($i = 0; $i < count($foreKomstProcenter); $i++)
        {
            if($foreKomstProcenter[$i] > $this->storstProcent)
            {
                $this->storstProcent = $foreKomstProcenter[$i];
            }
        }
    }
    public function tegnFrekGraf() 
    {
        $this->setStorstHyppighed();
        $this->setStorstProcent();
        $graphFrame = imagecreatetruecolor(600, 330);
        $sort = imagecolorallocate($graphFrame, 0, 0, 0);
        $hvid = imagecolorallocate($graphFrame, 255, 255, 255);
        $graa = imagecolorallocate($graphFrame, 108, 117, 126);
        $font = 'C:/Windows/Fonts/arial.ttf';
        $interval = (525 /((count($this->foreKomster)*2)-1));
        imagefill($graphFrame, 0, 0, $hvid);
        imageline($graphFrame, 50, 300, 50, 20, $sort);
        imageline($graphFrame, 50, 300, 575, 300, $sort);
        $yinc = 0;
        $procentInterval = $this->storstProcent/$this->storstHyppighed;
        for($i = 0; $i < $this->storstHyppighed + 1; $i++)
        {

            imageline($graphFrame, 50, 20 + $yinc, 575, 20 + $yinc, $sort);
            if($i == 0)
            {
                imagettftext($graphFrame, 14, 0, 10, 27 + $yinc, $sort, $font, round($this->storstProcent/10) . "%");
            }
            else 
            {
                $this->storstProcent = $this->storstProcent - $procentInterval;
                imagettftext($graphFrame, 14, 0, 10, 27 + $yinc, $sort, $font, abs(round($this->storstProcent / 10)) . "%");
            }
            $yinc += 280/$this->storstHyppighed;
        }
        $xinc = 0;
        for($i = 0; $i < count($this->foreKomster); $i++)
        {
            imagefilledrectangle($graphFrame, 50 + $xinc, 300, 50 + $interval + $xinc, 300-($this->foreKomster[$i][1]*280/$this->storstHyppighed), $graa);
            imagerectangle($graphFrame, 50 + $xinc, 300, 50 + $interval + $xinc, 300-($this->foreKomster[$i][1]*280/$this->storstHyppighed), $sort);
            imagettftext($graphFrame, 14, 0, 50 + $xinc, 320, $sort, $font, $this->foreKomster[$i][0]);
            $xinc += $interval*2;
        }
        header('Content-Type: image/png');
        imagepng($graphFrame);
        imagedestroy($graphFrame);
    }
    public function tegnHypGraf() 
    {
        $this->setStorstHyppighed();
        $graphFrame = imagecreatetruecolor(600, 330);
        $sort = imagecolorallocate($graphFrame, 0, 0, 0);
        $hvid = imagecolorallocate($graphFrame, 255, 255, 255);
        $graa = imagecolorallocate($graphFrame, 108, 117, 126);
        $font = 'C:/Windows/Fonts/arial.ttf';
        $interval = (550 /((count($this->foreKomster)*2)-1));
        imagefill($graphFrame, 0, 0, $hvid);
        imageline($graphFrame, 25, 300, 25, 20, $sort);
        imageline($graphFrame, 25, 300, 575, 300, $sort);
        $yinc = 0;
        for($i = 0; $i < $this->storstHyppighed + 1; $i++)
        {
            if($i <= $this->storstHyppighed - 1)
            {
                imageline($graphFrame, 25, 20 + $yinc, 575, 20 + $yinc, $sort);
                imagettftext($graphFrame, 14, 0, 10, 27 + $yinc, $sort, $font, $this->storstHyppighed-$i);
                $yinc += 280/$this->storstHyppighed;
            }
            else 
            {
                imagettftext($graphFrame, 14, 0, 10, 27 + $yinc, $sort, $font, 0);
            }
        }
        $xinc = 0;
        for($i = 0; $i < count($this->foreKomster); $i++)
        {
            imagefilledrectangle($graphFrame, 25 + $xinc, 300, 25 + $interval + $xinc, 300-($this->foreKomster[$i][1]*(280/$this->storstHyppighed)), $graa);
            imagerectangle($graphFrame, 25 + $xinc, 300, 25 + $interval + $xinc, 300-($this->foreKomster[$i][1]*(280/$this->storstHyppighed)), $sort);
            imagettftext($graphFrame, 14, 0, 25 + $xinc, 320, $sort, $font, $this->foreKomster[$i][0]);
            $xinc += $interval*2;
        }
        header('Content-Type: image/png');
        imagepng($graphFrame);
        imagedestroy($graphFrame);
    }
}