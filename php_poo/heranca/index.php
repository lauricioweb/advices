<?php

class Users
{
  public $name;
  public $email;
  public $phone;

  public function __construct($name, $email, $phone)
  {
    $this->name = $name;
    $this->email = $email;
    $this->phone = $phone;
  }
}


class Admin extends Users
{
  public function login()
  {
    echo "logado como $this->name permissão admin";
    exit;
  }
}


$userOne = new Admin("lauricio", "developer@gmail.com", "3848394");

$userOne->login();

// User (pai)
// ├── Admin (filho)
// └── Cliente (filho)
