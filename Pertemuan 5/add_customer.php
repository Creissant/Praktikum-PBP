<!-- Nama: Fahrel Gibran Alghany -->
<!-- NIM: 24060120130106 -->

<?php include('header.html') ?>
<br>
<div class="card">
  <div class="card-header">Add Customers Data</div>
  <div class="card-body">
    <!--method form dapat diganti GET/POST-->
    <form method="POST" autocomplete="on">
      <div class="form-group">
        <label for="name">Nama:</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <br>
      <div class="form-group">
        <label for="address">Address:</label>
        <textarea class="form-control" name="address" id="address"></textarea>
      </div>
      <br>
      <div class="form-group">
        <label for="city">City : </label>
        <select name="city" id="city" class="form-control" required>
          <option value="none" <?php if (!isset($city)) echo 'selected="true"'; ?>>-- Select a City --</option>
          <option value="Airport West">Airport West</option>
          <option value="Box Hill">Box Hill</option>
          <option value="Yarraville">Yarraville</option>
        </select>
      </div><br>
      <button type="button" class="btn btn-primary" onclick="add_customer_post()">Add (POST)</button>
      <!--Untuk memanggil fungsi add_customer_post() untuk method form = "POST"-->
      <!--<button type="button" class="btn btn-primary" onclick="add_customer_get()">Add (POST)</button>-->
      <!--Untuk memanggil fungsi add_customer_get() untuk method form = "GET"-->
    </form>
    <br>
    <div id="add_response"></div>
  </div>
</div>
<?php include('footer.html') ?>