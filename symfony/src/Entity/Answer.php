<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnswerRepository::class)
 */
class Answer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Question::class, inversedBy="answers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Question;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     */
    private $Content;

    /**
     * @ORM\OneToMany(targetEntity=RespondentAnswers::class, mappedBy="Answer")
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

    public function getQuestion(): ?Question
    {
        return $this->Question;
    }

    public function setQuestion(?Question $Question): self
    {
        $this->Question = $Question;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->Content;
    }

    public function setContent(?string $Content): self
    {
        $this->Content = $Content;

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
            $respondentAnswer->setAnswer($this);
        }

        return $this;
    }

    public function removeRespondentAnswer(RespondentAnswers $respondentAnswer): self
    {
        if ($this->respondentAnswers->contains($respondentAnswer)) {
            $this->respondentAnswers->removeElement($respondentAnswer);
            // set the owning side to null (unless already changed)
            if ($respondentAnswer->getAnswer() === $this) {
                $respondentAnswer->setAnswer(null);
            }
        }

        return $this;
    }

}
