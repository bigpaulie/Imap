<?php

namespace bigpaulie\imap\Interfaces;


use bigpaulie\imap\Exceptions\ImapException;
use bigpaulie\imap\Message\Message;
use bigpaulie\imap\Message\MessageIterator;

/**
 * Interface MailboxInterface
 * @package bigpaulie\imap\Interfaces
 */
interface MailboxInterface
{
    /**
     * @return array
     * @throws ImapException
     */
    public function getInfo():array ;

    /**
     * @return MessageIterator
     * @throws ImapException
     */
    public function getMessages():MessageIterator;

    /**
     * @param Message $message
     * @param string $mailbox
     * @return bool
     */
    public function moveMessage(Message $message, string $mailbox);

    /**
     * @param Message $message
     * @param string $mailbox
     * @return bool
     */
    public function copyMessage(Message $message, string $mailbox);

    /**
     * @param Message $message
     * @param bool $immediate
     * @return bool
     */
    public function deleteMessage(Message $message, bool $immediate = true);
}