<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OperacjeNaZbiorach
 *
 * @author student
 */
class OperacjeNaZbiorachService {
    /**
     *
     * @$wynik przechowuje wynik wykonania programu
     * $zbiory przechowuje dane
     * suma zapisuje do wyniku sume zbiorow
     */
    private $zbiory;
    private $wynik;
    
    public function getZbiory()
    {
        return $this->zbiory;
    }
    public function setZbiory($zbiory)
    {
        $this->zbiory = $zbiory;
    }
    public function getWynik()
    {
        return $this->wynik;
    }
    public function setWynik($wynik)
    {
        $this->wynik = $wynik;
    }
    public function suma(){
        $this->wynik = array();
        foreach ($this->zbiory as $i)
        {
            $this->wynik = array_merge($this->wynik,$i);
        }
        $this->wynik = array_unique($this->wynik);
        $this->wynik = array_values($this->wynik);
        
    }
	public function iloczyn(){
		$this->wynik = $this->zbiory[0];
		foreach ($this->zbiory as $i)
		{
			$this->wynik = array_intersect($this->wynik,$i);
		}
		$this->wynik = array_values($this->wynik);
	}
}
