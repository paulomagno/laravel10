<?php

namespace App\DTO\Supports;

use App\Enums\SupportStatus;
use App\Http\Requests\StoreUpdateSupportRequest;

class UpdateSupportDTO
{
    public string $id;
    public string $subject;
    public SupportStatus $status;
    public string $body;

    public function __construct(
        string $id,
        string $subject,
        SupportStatus $status,
        string $body
    ) {
        $this->id = $id;
        $this->subject = $subject;
        $this->status = $status;
        $this->body = $body;
    }

    public static function makeFromRequest(StoreUpdateSupportRequest $request, string $id = null): self
    {
        return new self(
            $id ?? $request->id,
            $request->subject,
            SupportStatus::A,
            $request->body
        );
    }
   
}