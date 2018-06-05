<?php

namespace bigpaulie\imap\Message;


class Headers
{
    /**
     * @var string
     */
    private $to;

    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $cc;

    /**
     * @var string
     */
    private $bcc;

    /**
     * @var string
     */
    private $reply_to;

    /**
     * @var string
     */
    private $sender;

    /**
     * @var string
     */
    private $date_sent;

    /**
     * @var bool
     */
    private $deleted;

    /**
     * @var bool
     */
    private $answered;

    /**
     * @var bool
     */
    private $draft;

    /**
     * @var string
     */
    private $original_encoding;

    /**
     * @var int
     */
    private $size;
    /**
     * @var string
     */
    private $auto_response;

    /**
     * Headers constructor.
     * @param string $to
     * @param string $from
     * @param string $cc
     * @param string $bcc
     * @param string $reply_to
     * @param string $sender
     * @param string $date_sent
     * @param bool $deleted
     * @param bool $answered
     * @param bool $draft
     * @param string $original_encoding
     * @param int $size
     * @param bool $auto_response
     */
    public function __construct(
        string $to,
        string $from,
        string $cc,
        string $bcc,
        string $reply_to,
        string $sender,
        string $date_sent,
        bool $deleted,
        bool $answered,
        bool $draft,
        string $original_encoding,
        int $size,
        bool $auto_response
    )
    {
        $this->to = $to;
        $this->from = $from;
        $this->cc = $cc;
        $this->bcc = $bcc;
        $this->reply_to = $reply_to;
        $this->sender = $sender;
        $this->date_sent = $date_sent;
        $this->deleted = $deleted;
        $this->answered = $answered;
        $this->draft = $draft;
        $this->original_encoding = $original_encoding;
        $this->size = $size;
        $this->auto_response = $auto_response;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getCc(): string
    {
        return $this->cc;
    }

    /**
     * @return string
     */
    public function getBcc(): string
    {
        return $this->bcc;
    }

    /**
     * @return string
     */
    public function getReplyTo(): string
    {
        return $this->reply_to;
    }

    /**
     * @return string
     */
    public function getSender(): string
    {
        return $this->sender;
    }

    /**
     * @return string
     */
    public function getDateSent(): string
    {
        return $this->date_sent;
    }

    /**
     * @return bool
     */
    public function getDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * @return bool
     */
    public function getAnswered(): bool
    {
        return $this->answered;
    }

    /**
     * @return bool
     */
    public function getDraft(): bool
    {
        return $this->draft;
    }

    /**
     * @return string
     */
    public function getOriginalEncoding(): string
    {
        return $this->original_encoding;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @return bool
     */
    public function getAutoResponse(): bool
    {
        return $this->auto_response;
    }
}