<?php

namespace App\Entity;

use App\Repository\SurveyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SurveyRepository::class)
 */
class Survey
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="surveys")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Title;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $IsClosed;

    /**
     * @ORM\Column(type="date")
     */
    private $Creation;

    /**
     * @ORM\OneToMany(targetEntity=Question::class, mappedBy="Survey", orphanRemoval=true)
     */
    private $questions;

    /**
     * @ORM\OneToMany(targetEntity=Respondent::class, mappedBy="Survey")
     */
    private $respondents;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
        $this->respondents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getIsClosed(): ?bool
    {
        return $this->IsClosed;
    }

    public function setIsClosed(bool $IsClosed): self
    {
        $this->IsClosed = $IsClosed;

        return $this;
    }

    public function getCreation(): ?\DateTimeInterface
    {
        return $this->Creation;
    }

    public function setCreation(\DateTimeInterface $Creation): self
    {
        $this->Creation = $Creation;

        return $this;
    }

    /**
     * @return Collection|Question[]
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions[] = $question;
            $question->setSurvey($this);
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        if ($this->questions->contains($question)) {
            $this->questions->removeElement($question);
            // set the owning side to null (unless already changed)
            if ($question->getSurvey() === $this) {
                $question->setSurvey(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Respondent[]
     */
    public function getRespondents(): Collection
    {
        return $this->respondents;
    }

    public function addRespondent(Respondent $respondent): self
    {
        if (!$this->respondents->contains($respondent)) {
            $this->respondents[] = $respondent;
            $respondent->setSurvey($this);
        }

        return $this;
    }

    public function removeRespondent(Respondent $respondent): self
    {
        if ($this->respondents->contains($respondent)) {
            $this->respondents->removeElement($respondent);
            // set the owning side to null (unless already changed)
            if ($respondent->getSurvey() === $this) {
                $respondent->setSurvey(null);
            }
        }

        return $this;
    }
}
