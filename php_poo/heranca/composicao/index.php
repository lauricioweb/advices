<?php

interface notificationInterface
{
  public function send(string $message);
}

class EmailSender implements notificationInterface
{
  public function send(string $message)
  {
    echo $message;
  }
}

class SmsSender implements notificationInterface
{
  public function send(string $message)
  {
    echo $message;
  }
}

class SystemNotification
{
  private  notificationInterface $sender;

  public function __construct(notificationInterface $sender)
  {
    $this->sender = $sender;
  }

  public function send($message)
  {
    $this->sender->send($message);
  }
}

$lausystem = new SystemNotification(new EmailSender);

$lausystem->send("seja bem vindo");
