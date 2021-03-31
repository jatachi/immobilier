<?php

namespace App\Entity;

use App\Repository\PropertyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PropertyRepository::class)
 */
class Property
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $illustration;

   

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=TypeProperty::class, inversedBy="properties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeproperty;

    /**
     * @ORM\Column(type="text")
     */
    private $situation;

    /**
     * @ORM\Column(type="text")
     */
    private $proximite;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isbest;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isavaible;

    /**
     * @ORM\OneToMany(targetEntity=Attachements::class, mappedBy="property", cascade={"persist"})
     */
    private $attachements;

    public function __construct()
    {
        $this->attachements = new ArrayCollection();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getIllustration(): ?string
    {
        return $this->illustration;
    }

    public function setIllustration(string $illustration): self
    {
        $this->illustration = $illustration;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getTypeproperty(): ?TypeProperty
    {
        return $this->typeproperty;
    }

    public function setTypeproperty(?TypeProperty $typeproperty): self
    {
        $this->typeproperty = $typeproperty;

        return $this;
    }

    public function getSituation(): ?string
    {
        return $this->situation;
    }

    public function setSituation(string $situation): self
    {
        $this->situation = $situation;

        return $this;
    }

    public function getProximite(): ?string
    {
        return $this->proximite;
    }

    public function setProximite(string $proximite): self
    {
        $this->proximite = $proximite;

        return $this;
    }

    public function getIsbest(): ?bool
    {
        return $this->isbest;
    }

    public function setIsbest(bool $isbest): self
    {
        $this->isbest = $isbest;

        return $this;
    }

    public function getIsavaible(): ?bool
    {
        return $this->isavaible;
    }

    public function setIsavaible(bool $isavaible): self
    {
        $this->isavaible = $isavaible;

        return $this;
    }

    /**
     * @return Collection|Attachements[]
     */
    public function getAttachements(): Collection
    {
        return $this->attachements;
    }

    public function addAttachement(Attachements $attachement): self
    {
        if (!$this->attachements->contains($attachement)) {
            $this->attachements[] = $attachement;
            $attachement->setProperty($this);
        }

        return $this;
    }

    public function removeAttachement(Attachements $attachement): self
    {
        if ($this->attachements->removeElement($attachement)) {
            // set the owning side to null (unless already changed)
            if ($attachement->getProperty() === $this) {
                $attachement->setProperty(null);
            }
        }

        return $this;
    }
}
