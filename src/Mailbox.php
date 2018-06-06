<?php

namespace bigpaulie\imap;


use bigpaulie\imap\Exceptions\ImapException;
use bigpaulie\imap\Interfaces\MailboxInterface;
use bigpaulie\imap\Message\Message;
use bigpaulie\imap\Message\MessageIterator;

/**
 * Class Mailbox
 * @package bigpaulie\imap
 */
class Mailbox implements MailboxInterface
{
    /**
     * @var Imap
     */
    private $resource;

    /**
     * Mailbox constructor.
     * @param Imap $resource
     */
    public function __construct(Imap $resource)
    {
        $this->resource = $resource;
    }

    /**
     * @return array
     * @throws ImapException
     */
    public function getInfo(): array
    {
        return $this->resource->getCurrentMailboxInfo();
    }

    /**
     * @return MessageIterator
     * @throws ImapException
     */
    public function getMessages(): MessageIterator
    {
        /** @var Message[] $messages */
        $messages = [];

        /** @var int[] $messageIds */
        $messageIds = $this->resource->getMessageIds();
        foreach ($messageIds as $id) {
            $messages[] = $this->resource->getMessage($id);
        }

        return new MessageIterator($messages);
    }

    /**
     * @param Message $message
     * @param string $mailbox
     * @return bool
     */
    public function moveMessage(Message $message, string $mailbox)
    {
        return $this->resource->moveMessage($message->getMessageId(), $mailbox);
    }

    /**
     * @param Message $message
     * @param string $mailbox
     * @return bool
     * @throws ImapException
     */
    public function copyMessage(Message $message, string $mailbox)
    {
        throw new ImapException('Method not yet implemented');
    }

    /**
     * @param Message $message
     * @param bool $immediate
     * @return void
     * @throws ImapException
     */
    public function deleteMessage(Message $message, bool $immediate = true)
    {
        $this->resource->deleteMessage($message->getMessageId(), $immediate);
    }
}