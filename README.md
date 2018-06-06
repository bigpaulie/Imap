# Imap

This library is an improvement of [Jeff Geerling's](https://github.com/geerlingguy/Imap) project tailored specifically 
for my needs at the moment.

Keep in mind that this is still a work in progress so radical changes may occurr in time.

## Installation 
You can install this library via composer by running the command bellow or you can clone the repository.
```bash
composer require bigpaulie/imap
```

## Usage

**A mailbox in the context of this library is referring to a directory of your email account.**

Connect to an IMAP account by creating a new Imap object with the required
parameters:

```php
$host = 'imap.example.com';
$user = 'johndoe';
$pass = '12345';
$port = 993;
$ssl = true;
$folder = 'INBOX';
$server = new Imap($host, $user, $pass, $port, $ssl, $folder);
```

##### Obtain a mailbox object

```php
/** @var Mailbox $mailbox */
$mailbox = $server->getMailbox();
```

If you want to access another directory 
```php
/** @var Mailbox $mailbox */
$mailbox = $server->getMailbox('SPAM');
```

##### Mailbox info
```php
/** @var array $info */
$info = $mailbox->getInfo();
```

##### Obtain a list of messages within a specific mailbox
```php
/** @var Message[] $messages */
$messages = $mailbox->getMessages();
```
You can then iterate through the array of messages
```php
/** @var Message $message */
foreach ($messages as $message) {
    $subject = $message->getSubject();
    $messageBody = $message->getBody();
}
```

##### Create a search criteria 
You can obtain only certain messages if you want to.

Only undeleted messages

```php
/** @var Search $criteria */
$criteria = new Search();
$criteria->setCriteria(Search::UNDELETED);

/** @var Message[] $messages */
$messages = $mailbox->getMessages($criteria);
```
You can add multiple search criterias for example :

```php
/** @var Search $criteria */
$criteria = new Search();
$criteria->setCriteria(Search::UNDELETED);
$criteria->setCriteria(Search::FROM, "John Doe");
$criteria->setCriteria(Search::KEYWORD, "candy");

/** @var Message[] $messages */
$messages = $mailbox->getMessages($criteria);
```

Search criterias can be chained together:
```php
/** @var Search $criteria */
$criteria = new Search();
$criteria->setCriteria(Search::UNDELETED)
    ->setCriteria(Search::FROM, "John Doe")
    ->setCriteria(Search::KEYWORD, "candy");

/** @var Message[] $messages */
$messages = $mailbox->getMessages($criteria);
```

##### Moving messages 
You can move messages from one mailbox to another very easily
```php
if ($mailbox->moveMessage($message, 'SPAM')) {
    echo "Message moved successfuly";
}
```

##### Copying messages
Copying messages is as easy as moving them
```php
if ($mailbox->copyMessage($message, 'SPAM')) {
    echo "Message moved successfuly";
}
```

##### Deleting messages
```php
$mailbox->deleteMessage($message);
```

##### Disconnecting from the server
```php
$server->disconnect();
```

### Contributions
If you want to make a contribution and improve the library or you noticed a bug you are more than welcome to do so.

For contributors just fork, code and submit a pull request.

**Please maintain the coding style and testing patterns.**
