<?php 

namespace App\Repositories;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use stdClass;

class SupportEloquentORM implements SupportRepositoryInterface
{
    public function getAll(string $filter = null): array
    {
        return [];
    }

    public function findOne(string $id): stdClass 
    {
        return new stdClass();
    }
    
    public function delete(int $id): void 
    {
       
    }
    public function new(CreateSupportDTO $dto) : stdClass
    {
        return new stdClass();
    }
    public function update(UpdateSupportDTO $dto): stdClass
    {
        return new stdClass();
    }
}