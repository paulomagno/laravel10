<?php

namespace App\DTO\Supports;

use App\Enums\SupportStatus;
use App\Http\Requests\StoreUpdateSupportRequest;

class CreateSupportDTO
{
    public string $subject;
    public SupportStatus $status;
    public string $body;

    public function __construct(
        string $subject,
        SupportStatus $status,
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
            SupportStatus::A,
            $request->body
        );
    }
   
}