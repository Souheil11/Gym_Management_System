<?php
include("connection.php");
include("functions.php");

$input = $_POST['input'];

if (!empty($input)) {
  $query = "SELECT * FROM users WHERE user_id LIKE '{$input}%' OR user_name LIKE '{$input}%' OR first_name LIKE '{$input}%' OR last_name LIKE '{$input}%' OR email LIKE '{$input}%'";
} else {
  $query = "SELECT * FROM users";
}

$query_run = mysqli_query($con, $query);

if(mysqli_num_rows($query_run) > 0) {
  while($user = mysqli_fetch_assoc($query_run)) {
    ?>
    <tr>
      <td><?= $user['user_id']; ?></td>
      <td><?= $user['user_name']; ?></td>
      <td><?= $user['first_name']; ?></td>
      <td><?= $user['last_name']; ?></td>
      <td><?= $user['email']; ?></td>
      <td>
        <form action="" method="POST" class="d-inline">
          <a href="edit_user.php?id=<?= $user['id']; ?>" class="btn btn-success btn-sm">Edit</a>
          <button type="submit" name="delete_user" value="<?= $user['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
        </form>
      </td>
    </tr>
    <?php
  }
} else {
  echo "<tr><td colspan='6' class='text-danger text-center'>No data Found</td></tr>";
}
?>
