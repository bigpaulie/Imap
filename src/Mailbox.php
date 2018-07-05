<?php

namespace bigpaulie\imap;


use bigpaulie\imap\Exceptions\ImapException;
use bigpaulie\imap\Interfaces\MailboxInterface;
use bigpaulie\imap\Message\Message;
use bigpaulie\imap\Message\MessageIterator;
use bigpaulie\imap\Message\Search;

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
     * Get messages.
     *
     * @param Search|null $search
     * @return MessageIterator
     * @throws ImapException
     */
    public function getMessages(Search $search = null): MessageIterator
    {
        /** @var Message[] $messages */
        $messages = [];

        /** @var int[] $messageIds */
        $messageIds = $this->resource->getMessageIds($search);

        if (!empty($messageIds)) {
            foreach ($messageIds as $id) {
                $messages[] = $this->resource->getMessage($id);
            }
        }

        return new MessageIterator($messages);
    }

    /**
     * @param Message $message
     * @param string $mailbox
     * @return bool
     */
    public function moveMessage(Message $message, string $mailbox):bool
    {
        return $this->resource->moveMessage($message->getMessageId(), $mailbox);
    }

    /**
     * @param Message $message
     * @param string $mailbox
     * @return bool
     */
    public function copyMessage(Message $message, string $mailbox):bool
    {
        return $this->resource->copyMessage($message->getMessageId(), $mailbox);
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