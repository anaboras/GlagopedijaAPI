<?php
namespace Glagopedija;

/**
 * @Entity @Table(name="zapis_jezik")
 **/
class ZapisJezik
{
    /** @Id @Column(type="integer") @GeneratedValue  **/
    protected $id;

    /** @Column(type="integer") **/
    protected $kategorija;

    /** @Column(type="string") **/
    protected $jezik;
  
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
    

	public function setPodaci($podaci)
	{
		foreach($podaci as $kljuc => $vrijednost){
			$this->{$kljuc} = $vrijednost;
		}
	}

}
