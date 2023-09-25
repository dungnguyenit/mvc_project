<div class="container">
  <div class="text">
    create new contact
  </div>
  <form action="" method="POST">
    <div class="form-row">
      <div class="input-data">
        <input type="text" name="firstName">
        <div class="underline"></div>
        <label for="">First Name</label>
      </div>
      <div class="input-data">
        <input type="text" name="lastName">
        <div class="underline"></div>
        <label for="">Last Name</label>
      </div>
    </div>
    <div class="form-row">
      <div class="input-data">
        <input type="text" name="email">
        <div class="underline"></div>
        <label for="">Email </label>
      </div>
      <div class="input-data">
        <input type="text" name="phone">
        <div class="underline"></div>
        <label for="">Phone</label>
      </div>
    </div>
    <div class="form-row">
      <div class="input-data textarea">
        <textarea rows="8" cols="80" name="address"></textarea>
        <br />
        <div class="underline"></div>
        <label for="">Address</label>
        <br />
      </div>
    </div>
    <div class="form-row submit-btn">
      <div class="input-data">
        <div class="inner"></div>
        <input type="submit" value="add" name="btn">
      </div>
      <div class="input-data">
        <div class="inner"></div>
        <a href="view/listContact.php">
          <input type="submit" value="show list data" name="show">
          <button name="show">show list data</button>
        </a>
      </div>
    </div>
  </form>
</div>