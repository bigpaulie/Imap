<?php

/**
 * The Imap PHP class provides a wrapper for commonly used PHP IMAP functions.
 *
 * This class was originally written by Josh Grochowski, and was reformatted and
 * documented by Jeff Geerling.
 *
 * Usage examples can be found in the included README file, and all methods
 * should have adequate documentation to get you started.
 *
 * Quick Start:
 * @code
 *   include 'path/to/Imap/JJG/Imap.php';
 *   use \JJG\Imap as Imap;
 *   $mailbox = new Imap($host, $user, $pass, $port, $ssl, $folder);
 *   $mailbox->getMailboxInfo();
 * @endcode
 *
 * Minimum requirements: PHP 5.3.x, php5-imap
 *
 * @version 1.0-beta2
 * @author Josh Grochowski (josh[at]kastang[dot]com).
 * @author Jeff Geerling (geerlingguy).
 */

namespace bigpaulie\imap;

use bigpaulie\imap\Exceptions\ImapException;
use bigpaulie\imap\Message\Headers;
use bigpaulie\imap\Message\Message;

/**
 * Class Imap
 * @package bigpaulie\imap
 */
class Imap extends BaseClient
{
    /**
     * Imap constructor.
     * @param string $hostname
     * @param string $username
     * @param string $password
     * @param int $port
     * @param bool $ssl
     * @param string $folder
     * @throws ImapException
     */
    public function __construct(
        string $hostname,
        string $username,
        string $password,
        int $port,
        bool $ssl = true,
        string $folder = 'INBOX'
    )
    {
        if ((!isset($hostname)) || (!isset($username)) || (!isset($password)) || (!isset($port))) {
            throw new ImapException("Error: All Constructor values require a non NULL input.");
        }

        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->port = $port;
        $this->folder = $folder;
        $this->ssl = $ssl;

        $this->changeLoginInfo($hostname, $username, $password, $port, $ssl, $folder);
    }

    /**
     * Get a mailbox.
     *
     * @param string|null $mailboxName
     * @return Mailbox
     * @throws ImapException
     */
    public function getMailbox(string $mailboxName = null):Mailbox
    {
        if (null !== $mailboxName) {
            $this->changeFolder($mailboxName);
        }

        return new Mailbox($this);
    }

    /**
     * Closes an active IMAP connection.
     */
    public function disconnect()
    {
        // Close the connection, deleting all messages marked for deletion.
        imap_close($this->mailbox, CL_EXPUNGE);
        $this->mailbox = null;
    }
}
