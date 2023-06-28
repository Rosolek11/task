<h1 class='starting-title'>Nice to see you! 👋</h1>
<!-- Add user form -->

<form method="post">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" required>
  <br>
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required>
  <br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>
  <br>
  <label for="street">Street:</label>
  <input type="text" id="street" name="street" required>
  <br>
  <label for="suite">Suite:</label>
  <input type="text" id="suite" name="suite">
  <br>
  <label for="city">City:</label>
  <input type="text" id="city" name="city" required>
  <br>
  <label for="zipcode">Zipcode:</label>
  <input type="text" id="zipcode" name="zipcode">
  <br>
  <label for="phone">Phone:</label>
  <input type="tel" id="phone" name="phone">
  <br>
  <label for="company">Company:</label>
  <input type="text" id="company" name="company">
  <br>
  <input type="submit" name="submit" value="Add User">
</form>

<!-- Users table -->
<table>
  <tr>
    <th>Name</th>
    <th>Username</th>
    <th>Email</th>
    <th>Address</th>
    <th>Phone</th>
    <th>Company</th>
    <th>Action</th>
  </tr>
  <?php foreach ($users as $user): ?>
    <tr>
      <td><?= $user['name'] ?></td>
      <td><?= $user['username'] ?></td>
      <td><?= $user['email'] ?></td>
      <td><?= $user['address']['street'] . ', ' . $user['address']['suite'] . ' ' . $user['address']['city'] ?></td>
      <td><?= $user['phone'] ?></td>
      <td><?= $user['company']['name'] ?></td>
      <td><a href="?remove=<?= $user['id'] ?>">Remove</a></td>
    </tr>
  <?php endforeach; ?>
</table>
