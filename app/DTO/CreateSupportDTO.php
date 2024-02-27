<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateSupportRequest;

class CreateSupportDTO
{
    public string $subject;
    public string $status;
    public string $body;

    public function __construct(
        string $subject,
        string $status,
        string $body
    ) {
        $this->subject = $subject;
        $this->status = $status;
        $this->body = $body;
    }

    public static function makeFromRequest(StoreUpdateSupportRequest $request): self
    {
        return new self(
            $request->subject,
            'a',
            $request->body
        );
    }
   
}