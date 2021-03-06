<?php

declare(strict_types=1);

namespace App\Model;

use Ramsey\Uuid\Uuid;

trait PersistableAwareTrait
{
    private $id;

    public function getId(): ?string
    {
        if ($this->id instanceof Uuid) {
            return (string) $this->id;
        }

        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }
}
