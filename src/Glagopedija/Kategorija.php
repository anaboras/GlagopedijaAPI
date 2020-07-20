<?php
namespace Glagopedija;

/**
 * @Entity @Table(name="kategorija")
 **/
class Kategorija
{
    /** @Id @Column(type="integer") @GeneratedValue  **/
    protected $id;

    /** @Column(type="string") **/
    protected $naziv;
    
    /** @Column(type="integer") **/
    protected $slika;
    
    /** @Column(type="string") **/
    protected $slikaPutanja;
    
    /** @Column(type="integer") **/
	protected $grupa;

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

	public function getSlika(){
		return $this->slika;
	}

	public function setSlika($slika){
		$this->slika = $slika;
	}

	public function getSlikaPutanja(){
		return $this->slikaPutanja;
	}

	public function setSlikaPutanja($slikaPutanja){
		$this->slikaPutanja = $slikaPutanja;
	}

	public function getGrupa(){
		return $this->grupa;
	}

	public function setGrupa($grupa){
		$this->grupa = $grupa;
	}

	public function setPodaci($podaci)
	{
		foreach($podaci as $kljuc => $vrijednost){
			$this->{$kljuc} = $vrijednost;
		}
	}

}
