<?php
namespace Glagopedija;

/**
 * @Entity @Table(name="zapis")
 **/
class Zapis
{
    /** @Id @Column(type="integer") **/
	protected $id;
	
	/** @Column(type="integer") **/
	protected $kategorija;

    /** @Column(type="string") **/
	protected $jezik;
	/** @Column(type="string") **/
	protected $naziv;
	/** @Column(type="string") **/
	protected $mjesto;
	/** @Column(type="string") **/
	protected $godina;
	/** @Column(type="string") **/
	protected $pismo;
	/** @Column(type="string") **/
	protected $sadrzaj;
	/** @Column(type="string") **/
	protected $velicina;
	/** @Column(type="string") **/
	protected $zanimljivosti;
	/** @Column(type="string") **/
	protected $vrijeme;
	/** @Column(type="string", name="danasnje_pocivaliste") **/
	protected $danasnjePocivaliste;
  

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getKategorija(){
		return $this->kategorija;
	}

	public function setKategorija($kategorija){
		$this->kategorija = $kategorija;
	}

	public function getJezik(){
		return $this->jezik;
	}

	public function setJezik($jezik){
		$this->jezik = $jezik;
	}

	public function getNaziv(){
		return $this->naziv;
	}

	public function setNaziv($naziv){
		$this->naziv = $naziv;
	}

	public function getMjesto(){
		return $this->mjesto;
	}

	public function setMjesto($mjesto){
		$this->mjesto = $mjesto;
	}

	public function getGodina(){
		return $this->godina;
	}

	public function setGodina($godina){
		$this->godina = $godina;
	}

	public function getPismo(){
		return $this->pismo;
	}

	public function setPismo($pismo){
		$this->pismo = $pismo;
	}

	public function getSadrzaj(){
		return $this->sadrzaj;
	}

	public function setSadrzaj($sadrzaj){
		$this->sadrzaj = $sadrzaj;
	}

	public function getVelicina(){
		return $this->velicina;
	}

	public function setVelicina($velicina){
		$this->velicina = $velicina;
	}

	public function getZanimljivosti(){
		return $this->zanimljivosti;
	}

	public function setZanimljivosti($zanimljivosti){
		$this->zanimljivosti = $zanimljivosti;
	}

	public function getVrijeme(){
		return $this->vrijeme;
	}

	public function setVrijeme($vrijeme){
		$this->vrijeme = $vrijeme;
	}

	public function getDanasnjePocivaliste(){
		return $this->danasnjePocivaliste;
	}

	public function setDanasnjePocivaliste($danasnjePocivaliste){
		$this->danasnjePocivaliste = $danasnjePocivaliste;
	}

	public function setPodaci($podaci)
	{
		foreach($podaci as $kljuc => $vrijednost){
			$this->{$kljuc} = $vrijednost;
		}
	}

}
