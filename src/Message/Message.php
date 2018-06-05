<?php

namespace bigpaulie\imap\Message;

/**
 * Class Message
 * @package bigpaulie\imap\Message
 */
class Message
{
    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $body;

    /**
     * @var Headers
     */
    private $headers;
    /**
     * @var int
     */
    private $messageId;

    /**
     * Message constructor.
     * @param int $messageId
     * @param string $subject
     * @param string $body
     * @param Headers $headers
     */
    public function __construct(int $messageId, string $subject, string $body, Headers $headers)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->headers = $headers;
        $this->messageId = $messageId;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return Headers
     */
    public function getHeaders(): Headers
    {
        return $this->headers;
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->messageId;
    }
}