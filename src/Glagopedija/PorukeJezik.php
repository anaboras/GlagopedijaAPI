<?php
namespace Glagopedija;

/**
 * @Entity @Table(name="porukeapp_jezik")
 **/
class PorukeJezik
{
    /** @Id @Column(type="string") @GeneratedValue  **/
    protected $poruka;

    /** @Column(type="string") **/
    protected $jezik;
    
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



	public function setPodaci($podaci)
	{
		foreach($podaci as $kljuc => $vrijednost){
			$this->{$kljuc} = $vrijednost;
		}
	}

}
