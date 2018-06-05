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
     * Message constructor.
     * @param string $subject
     * @param string $body
     * @param Headers $headers
     */
    public function __construct(string $subject, string $body, Headers $headers)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->headers = $headers;
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
}