<?php

namespace App\Entity;

use App\Repository\RespondentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RespondentRepository::class)
 */
class Respondent
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Survey::class, inversedBy="respondents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Survey;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Age;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Surname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Sex;

    /**
     * @ORM\OneToMany(targetEntity=RespondentAnswers::class, mappedBy="Respondent")
     */
    private $respondentAnswers;

    public function __construct()
    {
        $this->respondentAnswers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSurvey(): ?Survey
    {
        return $this->Survey;
    }

    public function setSurvey(?Survey $Survey): self
    {
        $this->Survey = $Survey;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->Age;
    }

    public function setAge(?int $Age): self
    {
        $this->Age = $Age;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(?string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->Surname;
    }

    public function setSurname(?string $Surname): self
    {
        $this->Surname = $Surname;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->Sex;
    }

    public function setSex(?string $Sex): self
    {
        $this->Sex = $Sex;

        return $this;
    }

    /**
     * @return Collection|RespondentAnswers[]
     */
    public function getRespondentAnswers(): Collection
    {
        return $this->respondentAnswers;
    }

    public function addRespondentAnswer(RespondentAnswers $respondentAnswer): self
    {
        if (!$this->respondentAnswers->contains($respondentAnswer)) {
            $this->respondentAnswers[] = $respondentAnswer;
            $respondentAnswer->setRespondent($this);
        }

        return $this;
    }

    public function removeRespondentAnswer(RespondentAnswers $respondentAnswer): self
    {
        if ($this->respondentAnswers->contains($respondentAnswer)) {
            $this->respondentAnswers->removeElement($respondentAnswer);
            // set the owning side to null (unless already changed)
            if ($respondentAnswer->getRespondent() === $this) {
                $respondentAnswer->setRespondent(null);
            }
        }

        return $this;
    }
}
