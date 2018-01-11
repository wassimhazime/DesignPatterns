<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Creation\Builder;

/**
 * Description of BarReportBuilder
 *
 * @author wassime
 */

class BarReportBuilder implements IReportBuilder
{
   //... protected attributes
   public function __construct ($pWidth, $pHeight, $pFilePath)
    {
        $this->_width = $pWidth;
        $this->_height = $pHeight;
        $this->_filePath = $pFilePath;
    }
 
    public function addTitle($pTitle)
    {
        $this->_title = $pTitle;
    }
 
    public function addLegend($pLegend)
    {
        $this->_legend = $pLegend;
    }
 
    public function addExpense($pType, $pAmount)
    {
        $this->_expenses[$pType] = $pAmount;
        $this->_max += $pAmount;
    }
 
    public function getReport()
    {
        //creation de l'image
        $image = imagecreate($this->_width, $this->_height);
 
        //black filler
        $black = imagecolorallocate($image, 255, 255, 255);
        imagefilledrectangle($image, 0, 0 , $this->_width, $this->_height, $black);
 
        //now we're gonna fill the datas
        $indice = 0;
        $xPosition = self::BORDER_WIDTH;
        foreach ($this->_expenses as $type=>$expense) {
            $color = $this->_getColor($indice, $image);
            imagefilledrectangle($image,
                                 $xPosition,
                                 self::BORDER_WIDTH,
                                 $xPosition+($movedBy = ($expense/$this->_max) * ($this->_width-self::BORDER_WIDTH*2)),
                                 $this->_height-self::BORDER_WIDTH,
                                 $color
                                );
            $xPosition += $movedBy;
            $indice++;
        }
        imagegif($image, $this->_filePath);
    }
}
