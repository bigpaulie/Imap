<?php

namespace bigpaulie\imap\Message;

use bigpaulie\imap\Interfaces\MessageIteratorInterface;


/**
 * Class MessageIterator
 * @package bigpaulie\imap\Message
 */
class MessageIterator extends \ArrayIterator implements MessageIteratorInterface
{
    /**
     * MessageIterator constructor.
     * @param Message[] $messages
     */
    public function __construct(array $messages)
    {
        parent::__construct($messages);
    }
}