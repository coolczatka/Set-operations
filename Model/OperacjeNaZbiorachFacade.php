<?php

require_once "./Model/OperacjeNaZbiorachService.php";

require_once "./Model/OdczytDanychService.php";

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OperacjeNaZbiorachFacade
 *
 * @author student
 */
class OperacjeNaZbiorachFacade {
    /**
     * Wczytuje dane z pliku o nazwie $nazwaPliku
     * @param string $nazwaPliku
     * return array
     */
    public function wczytajDane($nazwaPliku){
        $odczytDanychService = new OdczytDanychService();//1
        $odczytDanychService->setNazwaPliku($nazwaPliku);//2
        $odczytDanychService->odczytaj();//3
        $odczytaneDane = $odczytDanychService->getZbiory();//4
        return $odczytaneDane;//5
    }
    /**
     * Oblicza sumę zbiorów z tablicy zbiory
     * @param string tablica ze zbiorami $zbiory
     * return array tablica z wynikiem obliczen
     */
    public function obliczSume($zbiory){
        $operacjeNaZbiorachService = new OperacjeNaZbiorachService;//1
        $operacjeNaZbiorachService->setZbiory($zbiory);
        $operacjeNaZbiorachService->suma();
        $wynikObliczen = $operacjeNaZbiorachService->getWynik();
        return $wynikObliczen;
	}
    public function obliczIloczyn($zbiory){
        $operacjeNaZbiorachService = new OperacjeNaZbiorachService;//1
        $operacjeNaZbiorachService->setZbiory($zbiory);
        $operacjeNaZbiorachService->iloczyn();
        $wynikObliczen = $operacjeNaZbiorachService->getWynik();
        return $wynikObliczen;    
        
    }
}
