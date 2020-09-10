<?php
namespace Glagopedija;

/**
 * @Entity @Table(name="grupa_jezik")
 **/
class GrupaJezik
{
    /** @Id @Column(type="integer")  **/
    protected $grupa;

    /** @Id @Column(type="string") **/
    protected $jezik;
    
    /** @Column(type="string") **/
	protected $vrijednost;

    public function getGrupa(){
		return $this->grupa;
	}

	public function setGrupa($grupa){
		$this->grupa = $grupa;
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
