<?php
namespace Glagopedija;

/**
 * @Entity @Table(name="porukeapp")
 **/
class Poruka
{
    /** @Id @Column(type="string") @GeneratedValue  **/
    protected $kljuc;

    /** @Column(type="string") **/
    protected $opis;
    
    public function getKljuc(){
		return $this->kljuc;
	}

	public function setKljuc($kljuc){
		$this->kljuc = $kljuc;
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
