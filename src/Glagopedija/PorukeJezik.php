<?php
namespace Glagopedija;

/**
 * @Entity @Table(name="porukeapp_jezik")
 **/
class PorukeJezik
{
    /** @Id @Column(type="string")  **/
    protected $poruka;

    /** @Id @Column(type="string") **/
	protected $jezik;
	
	/** @Column(type="string") **/
	protected $vrijednost;
	
	
    
    public function getPoruka(){
		return $this->poruka;
	}

	public function setPoruka($poruka){
		$this->poruka = $poruka;
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
