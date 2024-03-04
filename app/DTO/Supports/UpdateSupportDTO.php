<?php

namespace App\DTO\Supports;

use App\Http\Requests\StoreUpdateSupportRequest;

class UpdateSupportDTO
{
    public int $id;
    public string $subject;
    public string $status;
    public string $body;

    public function __construct(
        int $id,
        string $subject,
        string $status,
        string $body
    ) {
        $this->id = $id;
        $this->subject = $subject;
        $this->status = $status;
        $this->body = $body;
    }

    public static function makeFromRequest(StoreUpdateSupportRequest $request): self
    {
        return new self(
            $request->id,
            $request->subject,
            'a',
            $request->body
        );
    }
   
}