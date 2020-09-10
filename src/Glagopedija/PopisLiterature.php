<?php
namespace Glagopedija;

/**
 * @Entity @Table(name="popisLiterature")
 **/
class PopisLiterature
{
    /** @Id @Column(type="integer") @GeneratedValue  **/
    protected $id;

    /** @Column(type="string") **/
	protected $opis;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getOpis(){
		return $this->opis;
	}

	public function setOpis($opis){
		$this->opis = $opis;
	}

	public function setPodaci($podaci)
	{
		foreach($podaci as $kljuc => $vrijednost){
			$this->{$kljuc} = $vrijednost;
		}
	}

}
