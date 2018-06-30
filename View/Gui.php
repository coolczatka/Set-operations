<?php

require_once "./Model/OperacjeNaZbiorachFacade.php";

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gui
 *
 * @author student
 */
class Gui {
    public function __construct() {
        $_SESSION['daneWczytane'] = ' ';
        $_SESSION['suma'] = ' ';
		$_SESSION['iloczyn'] = ' ';
    }
    
    public function onClickWczytaj(){
        $nazwaPliku= $_FILES['browse']['tmp_name'];
        $fasada = new OperacjeNaZbiorachFacade();
        $_SESSION['zbiory'] = $fasada->wczytajDane($nazwaPliku);
		$wynik = $_SESSION['zbiory'];
		return print_r($wynik,TRUE);
    }
    public function onClickSuma(){
        $zbiory = $_SESSION['zbiory'];
        $fasada = new OperacjeNaZbiorachFacade();
        $_SESSION['wynik'] = $fasada->obliczSume($zbiory);
        $_SESSION['suma'] = "Obliczenia wykonane";
    }
	public function onClickIloczyn(){
        $zbiory = $_SESSION['zbiory'];
        $fasada = new OperacjeNaZbiorachFacade();
        $_SESSION['wynik'] = $fasada->obliczIloczyn($zbiory);
        $_SESSION['iloczyn'] = "Obliczenia wykonane";
    }
    public function onClickPokazWynik(){
        $wynik = $_SESSION['wynik'];
        return print_r($wynik,TRUE);
    }
	
    public function showWindow($wynikObliczen,$dane){
        $html = file_get_contents("View/gui.xhtml");
        $search = array(":wynik:", ":daneWczytane:", ":suma:", ":iloczyn:", ":zbiory:");
        $replace = array($wynikObliczen,$_SESSION['daneWczytane'],$_SESSION['suma'], $_SESSION['iloczyn'], $dane);
        $html = str_replace($search, $replace, $html);
        echo $html;
    }
    
}
