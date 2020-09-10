<?php
namespace Glagopedija;

/**
 * @Entity @Table(name="kategorija_jezik")
 **/
class KategorijaJezik
{

	
    /** @Id @Column(type="integer")  **/
    protected $kategorija;

    /** @Id @Column(type="string") **/
    protected $jezik;
    
    /** @Column(type="string") **/
	protected $vrijednost;

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

	public function getVrijednost(){
		return $this->vrijednost;
	}

	public function setVrijednost($vrijednost){
		$this->vrijednost = $vrijednost;
	}


	public function setPodaci($podaci)
	{
		foreach($podaci as $kljuc => $vrijednost){
			$this->{$kljuc} = $vrijednost;
		}
	}

}
