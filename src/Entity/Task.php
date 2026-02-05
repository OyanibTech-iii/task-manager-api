<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TaskRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Post(),
        new Put(),
        new Delete()
    ],
    normalizationContext: [
        'groups' => ['category:read']
    ],
    denormalizationContext: [
        'groups' => ['category:write']
    ]
)]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
        // #[Groups(['category:read', 'category:write'])]
    private ?string $taskt_Title = null;

    #[ORM\Column(type: Types::TEXT)]
    // #[Groups(['category:read', 'category:write'])]
    private ?string $task_decription = null;

    #[ORM\Column]
    // #[Groups(['task:read', 'task:write'])]
    private ?bool $isCompleted = null;

    #[ORM\Column]
    // #[Groups(['task:read'])]
    private ?\DateTimeImmutable $createdAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTasktTitle(): ?string
    {
        return $this->taskt_Title;
    }

    public function setTasktTitle(string $taskt_Title): static
    {
        $this->taskt_Title = $taskt_Title;

        return $this;
    }

    public function getTaskDecription(): ?string
    {
        return $this->task_decription;
    }

    public function setTaskDecription(string $task_decription): static
    {
        $this->task_decription = $task_decription;

        return $this;
    }

    public function isCompleted(): ?bool
    {
        return $this->isCompleted;
    }

    public function setIsCompleted(bool $isCompleted): static
    {
        $this->isCompleted = $isCompleted;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
