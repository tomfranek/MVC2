<?php

/*
 *  _____ _______         _                      _
 * |_   _|__   __|       | |                    | |
 *   | |    | |_ __   ___| |___      _____  _ __| | __  ___ ____
 *   | |    | | '_ \ / _ \ __\ \ /\ / / _ \| '__| |/ / / __|_  /
 *  _| |_   | | | | |  __/ |_ \ V  V / (_) | |  |   < | (__ / /
 * |_____|  |_|_| |_|\___|\__| \_/\_/ \___/|_|  |_|\_(_)___/___|
 *                   ___
 *                  |  _|___ ___ ___
 *                  |  _|  _| -_| -_|  LICENCE
 *                  |_| |_| |___|___|
 *
 * IT ZPRAVODAJSTVÍ  <>  PROGRAMOVÁNÍ  <>  HW A SW  <>  KOMUNITA
 *
 * Tento zdrojový kód pochází z IT sociální sítě WWW.ITNETWORK.CZ
 *
 * Můžete ho upravovat a používat jak chcete, musíte však zmínit
 * odkaz na http://www.itnetwork.cz
 */

// Výchozí kontroler pro ITnetworkMVC
abstract class Kontroler
{

	// Pole, jehož indexy jsou poté viditelné v šabloně jako běžné proměnné
    protected $data = array();
	// Název šablony bez přípony
    protected $pohled = "";
	// Hlavička HTML stránky
	protected $hlavicka = array('titulek' => '', 'klicova_slova' => '', 'popis' => '');

	// Vyrenderuje pohled
    public function vypisPohled()
    {
        if ($this->pohled)
        {
            extract($this->data);
            require("pohledy/" . $this->pohled . ".phtml");
        }
    }
	
	// Přesměruje na dané URL
	public function presmeruj($url)
	{
		header("Location: /$url");
		header("Connection: close");
        exit;
	}

	// Hlavní metoda controlleru
    abstract function zpracuj($parametry);

}