<?php

namespace App\DTO\Supports;

use App\Enums\SupportStatus;
use App\Http\Requests\StoreUpdateSupportRequest;

class UpdateSupportDTO
{
    public int $id;
    public string $subject;
    public SupportStatus $status;
    public string $body;

    public function __construct(
        int $id,
        string $subject,
        SupportStatus $status,
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
            SupportStatus::A,
            $request->body
        );
    }
   
}