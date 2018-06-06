<?php

namespace bigpaulie\imap\Message;



/**
 * Class MessageIterator
 * @package bigpaulie\imap\Message
 */
class MessageIterator extends \ArrayIterator
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