<?php
/**
 * Created by PhpStorm.
 * User: sudarshanmahesh
 * Date: 2019-02-15
 * Time: 11:22
 */

class Woonwijk {
	public $Huizen;

	public function __construct( $Huizen ) {
		$this->Huizen = $Huizen;
	}
}

class Huis {
	public $Verdiepingen;
	public $Kamers;
	public $Prijs;

	public function __construct( $Verdiepingen, $Kamers ) {
		$this->Verdiepingen = $Verdiepingen;
		$this->Kamers       = $Kamers;
		$this->setPrijs();
	}

	private function setPrijs() {
		foreach ( $this->Kamers as $kamer ) {
			$this->Prijs = $this->Prijs + $kamer->Groote;
		}
	}
}

class Kamer {
	public $Breedte;
	public $Hoogte;
	public $Diepte;
	public $Groote;

	public function __construct( $Breedte, $Hoogte, $Diepte ) {
		$this->Diepte  = $Diepte;
		$this->Breedte = $Breedte;
		$this->Hoogte  = $Hoogte;
		$this->setPrijs();
	}

	public function setPrijs() {
		$this->Groote = $this->Diepte * $this->Breedte * $this->Hoogte;
	}
}

$kamer1 = new Kamer( 3, 3, 3 );
$kamer2 = new Kamer( 4, 3, 3 );
$kamer3 = new Kamer( 2, 3, 3 );
$kamer4 = new Kamer( 6, 3, 5 );
$kamer5 = new Kamer( 6, 3, 4 );
$kamer6 = new Kamer( 4, 3, 2 );


$huis1 = new Huis( 2, [ $kamer1, $kamer4 ] );
$huis2 = new Huis( 1, [ $kamer1, $kamer3 ] );
$huis3 = new Huis( 3, [ $kamer1, $kamer2, $kamer3, $kamer4, $kamer5, $kamer6 ] );

$woonwijk1 = new Woonwijk( [ $huis1, $huis2, $huis3 ] );





$i = 1;

foreach ( $woonwijk1->Huizen as $huis ) {
	echo "Huis $i: <br>";
	echo "Verdiepingen: " . $huis->Verdiepingen;

	$k = 1;

	foreach ( $huis->Kamers as $kamer ) {
		echo "<br>--- Kamer $k: <br>";
		echo "------ Breedte: " . $kamer->Breedte . " m<br>";
		echo "------ Diepte: " . $kamer->Diepte . " m<br>";
		echo "------ Hoogte: " . $kamer->Hoogte . " m<br>";
		echo "------ Groote: " . $kamer->Groote . " m³<br>";
		$k ++;
	}

	echo "Prijs: €" . $huis->Prijs . "<br>";

	$i ++;
	echo "<br><hr><br>";
}