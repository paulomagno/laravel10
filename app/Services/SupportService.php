<?php

namespace App\Services;

use stdClass;

class SupportService
{
    protected $repository;

    public function __construct()
    {
        
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
        string $subject,
        string $status, 
        string $body
    ): stdClass
    {
        return $this->repository->new($subject, $status, $body);
    }

    public function delete(int $id): void
    {
        $this->repository->delete($id);
    }

    public function update(
        int $id,
        string $subject,
        string $status, 
        string $body
    ): stdClass
    {
        return $this->repository->update($id, $subject, $status, $body);
    }
}