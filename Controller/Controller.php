<?php

require_once "./View/Gui.php";

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author student
 */
class Controller {

    /**
     * akcja wczytania danych z pliku
     */
    const WCZYTAJ = 1;

    /**
     * wykonanie obliczen
     */
    const OPERACJE = 2;

    /**
     * Wyswietlenie wyniku
     */
    const POKAZWYNIK = 3;

    /**
     * pokazanie pliku gui.xhtml
     */
    const POKAZGUI = 4;
	
	const ILOCZYN = 5;

    protected function getAction() {
        if (filter_input(INPUT_POST, 'load') === 'Wczytaj') {
            return self::WCZYTAJ;
        }
        
        if (filter_input(INPUT_POST, 'union') === 'Oblicz sume') {
            return self::OPERACJE;
        }
        
        if (filter_input(INPUT_POST, 'showresult') === 'Wyswietl') {
            return self::POKAZWYNIK;
        }
		if (filter_input(INPUT_POST, 'intersect') === 'Oblicz iloczyn') {
            return self::ILOCZYN;
        }
        return self::POKAZGUI;
    }

    public function processRequest() {
		$dane = ' ';
        $mojaZmiennaJAO = $this->getAction();
        $gui = new Gui();
        $wynikObliczen = ' ';
        if ($mojaZmiennaJAO == self::WCZYTAJ )
            $dane = $gui->onClickWczytaj();
        if ($mojaZmiennaJAO == self::OPERACJE)
            $gui->onClickSuma();
        if ($mojaZmiennaJAO == self::POKAZWYNIK)
            $wynikObliczen = $gui->onClickPokazWynik();
		if ($mojaZmiennaJAO == self::ILOCZYN)
            $gui->onClickIloczyn();
        $gui->showWindow($wynikObliczen,$dane);
    }

}
