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

class KontaktKontroler extends Kontroler
{
	public function zpracuj($parametry)
	{
		$this->hlavicka = array(
			'titulek' => 'Kontaktní formulář',
			'klicova_slova' => 'kontakt, email, formulář',
			'popis' => 'Kontaktní formulář našeho webu.'
		);
		$this->pohled = 'kontakt';

		if (isset($_POST["email"]))
		{
			
				$odesilacEmailu = new OdesilacEmailu();
				$oki = $odesilacEmailu->odesli("admin@adresa.cz", "Email z webu", $_POST['zprava'], $_POST['email']);
				if ($oki) {
					$this->data['stav'] = "Email byl odeslán OK ";
					$this->pohled = 'stavodeslani';
				}
				else {
					
					$this->data['stav'] = 'Odesláno ERR';
					
					$this->pohled = 'stavodeslani';
				}
		}
		
		
    }
}