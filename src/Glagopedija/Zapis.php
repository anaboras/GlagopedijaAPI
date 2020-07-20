<?php
namespace Glagopedija;

/**
 * @Entity @Table(name="zapis")
 **/
class Zapis
{
    /** @Id @Column(type="integer") @GeneratedValue  **/
    protected $id;

    /** @Column(type="string") **/
    protected $jezik;
  

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
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
