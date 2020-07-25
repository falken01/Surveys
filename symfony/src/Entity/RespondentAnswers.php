<?php

namespace App\Entity;

use App\Repository\RespondentAnswersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RespondentAnswersRepository::class)
 */
class RespondentAnswers
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Answer::class, inversedBy="respondentAnswers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Answer;

    /**
     * @ORM\ManyToOne(targetEntity=Respondent::class, inversedBy="respondentAnswers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Respondent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnswer(): ?Answer
    {
        return $this->Answer;
    }

    public function setAnswer(?Answer $Answer): self
    {
        $this->Answer = $Answer;

        return $this;
    }

    public function getRespondent(): ?Respondent
    {
        return $this->Respondent;
    }

    public function setRespondent(?Respondent $Respondent): self
    {
        $this->Respondent = $Respondent;

        return $this;
    }
}
