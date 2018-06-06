<?php

namespace bigpaulie\imap\Message;


/**
 * Class Search
 * @package bigpaulie\imap\Message
 * @see http://php.net/manual/ro/function.imap-search.php
 */
class Search
{
    const CRITERIA_ALL = 'ALL';
    const CRITERIA_ANSWERED = 'ANSWERED';
    const CRITERIA_BCC = 'BCC "{{value}}"';
    const CRITERIA_BEFORE = 'BEFORE "{{value}}"';
    const CRITERIA_BODY = 'BODY "{{value}}"';
    const CRITERIA_CC = 'CC "{{value}}"';
    const CRITERIA_DELETED = 'DELETED';
    const CRITERIA_FLAGGED = 'FLAGGED';
    const CRITERIA_FROM = 'FROM "{{value}}"';
    const CRITERIA_KEYWORD = 'KEYWORD "{{value}}"';
    const CRITERIA_OLD = 'OLD';
    const CRITERIA_ON = 'ON "{{value}}"';
    const CRITERIA_RECENT = 'RECENT';
    const CRITERIA_SEEN = 'SEEN';
    const CRITERIA_SINCE = 'SINCE "{{value}}"';
    const CRITERIA_SUBJECT = 'SUBJECT "{{value}}"';
    const CRITERIA_TO = 'TO "{{value}}"';
    const CRITERIA_UNANSWERED = 'UNANSWERED';
    const CRITERIA_UNDELETED = 'UNDELETED';
    const CRITERIA_UNFLAGGED = 'UNFLAGGED';
    const CRITERIA_UNKEYWORD = 'UNKEYWORD "{{value}}"';
    const CRITERIA_UNSEEN = 'UNSEEN';

    /**
     * @var array
     */
    private $criterias = [];

    /**
     * @param string $criteria
     * @param mixed $value
     * @return Search
     */
    public function setCriteria(string $criteria, $value = null):Search
    {
        if (null !== $value) {
            $this->criterias[] = str_replace('{{value}}', $value, $criteria);
        } else {
            $this->criterias[] = $criteria;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return implode(' ', $this->criterias);
    }
}