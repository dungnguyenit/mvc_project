<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<form action="" method="post">
  <table class="table" style=" border-radius: 18px;">
    <thead class="table-light" style="text-align: center;">
      <tr>
        <!-- <th>Stt</th> -->
        <th>Last Name</th>
        <th>First Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th colspan="4">option</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($data1 as $contact) :
      ?>
        <tr>
          <!-- <td><?php echo $contact->id ?></td> -->
          <td><?php echo $contact->lastName ?></td>
          <td><?php echo $contact->firstName ?></td>
          <td><?php echo $contact->email ?></td>
          <td><?php echo $contact->phone ?></td>
          <td><?php echo $contact->address ?></td>
          <td> <button type="button" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button></td>
          <td><button type="button" class="btn btn-danger">Delete</button></td>
          <td><button type="button" class="btn btn-primary">Detail</button></td>
          <td><a href="index.php"><button type="button" class="btn btn-secondary">Exit</button></a></td>
        </tr>
      <?php endforeach; ?>

      <!-- Modal edit-->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              ..............
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </div>
    </tbody>
  </table>
</form>