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

// Router je speciální typ controlleru, který podle URL adresy zavolá
// správný controller a jím vytvořený pohled vloží do šablony stránky

class SmerovacKontroler extends Kontroler
{
	// Instance controlleru
	protected $kontroler;
	
	// Metoda převede pomlčkovou variantu controlleru na název třídy
	private function pomlckyDoVelbloudiNotace($text) 
	{
		$veta = str_replace('-', ' ', $text);
		$veta = ucwords($veta);
		$veta = str_replace(' ', '', $veta);
		return $veta;
	}
	
	// Naparsuje URL adresu podle lomítek a vrátí pole parametrů
	private function parsujURL($url)
	{
		// Naparsuje jednotlivé části URL adresy do asociativního pole
        $naparsovanaURL = parse_url($url);
		// Odstranění počátečního lomítka
		$naparsovanaURL["path"] = ltrim($naparsovanaURL["path"], "/");
		// Odstranění bílých znaků kolem adresy
		$naparsovanaURL["path"] = trim($naparsovanaURL["path"]);
		// Rozbití řetězce podle lomítek
		$rozdelenaCesta = explode("/", $naparsovanaURL["path"]);
		return $rozdelenaCesta;
	}

    // Naparsování URL adresy a vytvoření příslušného controlleru
    public function zpracuj($parametry)
    {
		$naparsovanaURL = $this->parsujURL($parametry[0]);
				
		if (empty($naparsovanaURL[0]))		
			$this->presmeruj('clanek/uvod');		
		// kontroler je 1. parametr URL
		$tridaKontroleru = $this->pomlckyDoVelbloudiNotace(array_shift($naparsovanaURL)) . 'Kontroler';
		
		if (file_exists('kontrolery/' . $tridaKontroleru . '.php'))
			$this->kontroler = new $tridaKontroleru;
		else
			$this->presmeruj('chyba');
		
		// Volání controlleru
        $this->kontroler->zpracuj($naparsovanaURL);
		
		// Nastavení proměnných pro šablonu
		$this->data['titulek'] = $this->kontroler->hlavicka['titulek'];
		$this->data['popis'] = $this->kontroler->hlavicka['popis'];
		$this->data['klicova_slova'] = $this->kontroler->hlavicka['klicova_slova'];
		
		// Nastavení hlavní šablony
		$this->pohled = 'rozlozeni';
    }

}