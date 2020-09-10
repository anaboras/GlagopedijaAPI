<?php
namespace Glagopedija;

/**
 * @Entity @Table(name="jezik")
 **/
class Jezik
{
    /** @Id @Column(type="string") @GeneratedValue  **/
    protected $id;

    /** @Column(type="string") **/
	protected $naziv;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNaziv(){
		return $this->naziv;
	}

	public function setNaziv($naziv){
		$this->naziv = $naziv;
	}


	public function setPodaci($podaci)
	{
		foreach($podaci as $kljuc => $vrijednost){
			$this->{$kljuc} = $vrijednost;
		}
	}

}
