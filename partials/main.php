<?php

// Model
class UserModel {
  private $users;

  public function __construct() {
    $this->users = json_decode(file_get_contents('dataset/users.json'), true);
  }

  public function getUsers() {
    return $this->users;
  }

  public function addUser($data) {
    $newUser = [
      'id' => end($this->users)['id'] + 1,
      'name' => $data['name'],
      'username' => $data['username'],
      'email' => $data['email'],
      'address' => [
        'street' => $data['street'],
        'suite' => $data['suite'],
        'city' => $data['city'],
        'zipcode' => $data['zipcode']
      ],
      'phone' => $data['phone'],
      'company' => [
        'name' => $data['company']
      ]
    ];
    $this->users[] = $newUser;
    file_put_contents('dataset/users.json', json_encode($this->users));
  }

  public function removeUser($id) {
    $this->users = array_filter($this->users, function ($user) use ($id) {
      return $user['id'] != $id;
    });
    file_put_contents('dataset/users.json', json_encode(array_values($this->users)));

  }
}

// View
class UserView {
  private $model;

  public function __construct($model) {
    $this->model = $model;
  }

  public function render() {
    $users = $this->model->getUsers();
    include("view.php");
  }
}

// Controller
class UserController {
  private $model;
  private $view;

  public function __construct($model, $view) {
    $this->model = $model;
    $this->view = $view;
  }

  public function handleRequest() {
    if (isset($_POST['submit'])) {
      // Add new user
      $this->model->addUser($_POST);
    } elseif (isset($_GET['remove'])) {
      // Remove user
      $this->model->removeUser($_GET['remove']);
    }
    // Render the view
    $this->view->render();
  }
}

$model = new UserModel();
$view = new UserView($model);
$controller = new UserController($model, $view);
$controller->handleRequest();
