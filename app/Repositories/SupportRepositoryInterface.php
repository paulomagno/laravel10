<?php 

namespace App\Repositories;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use stdClass;

interface SupportRepositoryInterface
{
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass;
    public function delete(int $id): void;
    public function new(CreateSupportDTO $dto): stdClass;
    public function update(UpdateSupportDTO $dto): stdClass;
}