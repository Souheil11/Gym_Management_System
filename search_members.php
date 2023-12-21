<?php
include("connection.php");
include("functions.php");

$input = $_POST['input'];

if (!empty($input)) {
  $query = "SELECT * FROM members WHERE member_id LIKE '{$input}%' OR first_name LIKE '{$input}%' OR last_name LIKE '{$input}%'";
} else {
  $query = "SELECT * FROM members";
}

$query_run = mysqli_query($con, $query);

if(mysqli_num_rows($query_run) > 0) {
  while($member = mysqli_fetch_assoc($query_run)) {
    ?>
    <tr>
      <td><?= $member['member_id']; ?></td>
      <td><?= $member['first_name']; ?></td>
      <td><?= $member['last_name']; ?></td>
      <td><?= $member['email']; ?></td>
      <td><?= $member['package']; ?></td>
      <td><?= $member['start_date']; ?></td>
      <td><?= $member['trainer']; ?></td>
      <td>
        <form class="td-action" action="" method="POST" class="d-inline">
          <a href="edit_member.php?id=<?= $member['id']; ?>" class="btn btn-success btn-sm">Edit</a>
          <button type="submit" name="delete_member" value="<?= $member['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
        </form>
      </td>
    </tr>
    <?php
  }
} else {
  echo "<tr><td colspan='6' class='text-danger text-center'>No data Found</td></tr>";
}
?>
