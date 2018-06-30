<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OdcdzytDanych
 *
 * @author student
 */
class OdczytDanychService {
    /**
     *
     * @$nazwaPliku przechowuje nazwe pliku z ktorego importuje sie dane
     * $zbiory przechowuje dane
     */
    private $nazwaPliku;
    private $zbiory;
    
    public function getNazwaPliku(){
        return $this->nazwaPliku;
    }
    public function setNazwaPliku($nazwaPliku){
        $this->nazwaPliku = $nazwaPliku;
    }
    public function getZbiory(){
        return $this->zbiory;
    }
    public function setZbiory($zbiory){
        $this->zbiory = $zbiory;
    }
    public function odczytaj(){
        $zbiory = array();
        $zbior = array();
        $plik = fopen($this->nazwaPliku, 'r');
        while($linia = fgets($plik,4096))
        {
            if($linia == "")
                break;
            $znaki = array(" ","\t","\n","\r");
            $znak = "";
            $linia = str_replace($znaki,$znak,$linia);
            if($linia[0]=="{" && $linia[strlen($linia)-1]=="}")
            {
                $linia = rtrim($linia, "}"); // usuwa ”,” z końca linii
                $linia = ltrim($linia, "{"); // usuwa ”#” z początku linii
                $zbior = explode(",",$linia);
                $zbiory[] = $zbior;
            }
            else
                break;
        }
        $this->zbiory= $zbiory;
    }
}
