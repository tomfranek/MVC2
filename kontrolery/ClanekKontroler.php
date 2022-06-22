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

// Controller pro zpracování článku

class ClanekKontroler extends Kontroler
{
    public function zpracuj($parametry)
    {
        $this->data['d1'] = "Data d1 ";
        $this->data['d2'] = "Data dalsi ";
	
       
		header("CLANKY");
		
		$this->hlavicka['titulek'] = 'ČLANKY TF';
		// Nastavení šablony
	if (empty($parametry)){
		$this->pohled = "uvod";	
	}

	else {
        	if ($parametry[0]==""  ){
           	  $this->pohled = "uvod";
        	}
        	else {
         	  $this->pohled = $parametry[0];
          
        	}
	}
    }
}