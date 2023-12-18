<?php
include("connection.php");
include("functions.php");

$input = $_POST['input'];

if (!empty($input)) {
  $query = "SELECT * FROM trainers WHERE trainer_id LIKE '{$input}%' OR first_name LIKE '{$input}%' OR last_name LIKE '{$input}%' OR email LIKE '{$input}%'";
} else {
  $query = "SELECT * FROM trainers";
}

$query_run = mysqli_query($con, $query);

if(mysqli_num_rows($query_run) > 0) {
  while($trainer = mysqli_fetch_assoc($query_run)) {
    ?>
    <tr>
      <td><?= $trainer['trainer_id']; ?></td>
      <td><?= $trainer['first_name']; ?></td>
      <td><?= $trainer['last_name']; ?></td>
      <td><?= $trainer['email']; ?></td>
      <td><?= $trainer['phone']; ?></td>
      <td><?= $trainer['trainer_for']; ?></td>
      <td>
        <form action="" method="POST" class="d-inline">
          <a href="edit_trainer.php?id=<?= $trainer['id']; ?>" class="btn btn-success btn-sm">Edit</a>
          <button type="submit" name="delete_trainer" value="<?= $trainer['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
        </form>
      </td>
    </tr>
    <?php
  }
} else {
  echo "<tr><td colspan='6' class='text-danger text-center'>No data Found</td></tr>";
}
?>
