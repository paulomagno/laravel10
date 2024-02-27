<?php

namespace App\Services;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Repositories\SupportRepositoryInterface;
use stdClass;

class SupportService
{
    protected $repository;

    public function __construct(SupportRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(int $id): stdClass
    {
        return $this->repository->findOne($id);
    }

    public function new(
        CreateSupportDTO $dto
    ): stdClass
    {
        return $this->repository->new($dto);
    }

    public function delete(int $id): void
    {
        $this->repository->delete($id);
    }

    public function update(UpdateSupportDTO $dto): stdClass
    {
        return $this->repository->update($dto);
    }
}