<!-- Fahrel Gibran Alghany -->
<!-- 24060120130106 -->

<?php include('header.html') ?>
<div class="container m-5">
  <h4>Cari Buku</h4>
  <div class="input-group">
    <input id="search" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
    <button type="button" class="btn btn-outline-primary" onclick="search_book()">search</button>
  </div>
</div>
<div class="container" id="result">
  <!-- Tampilan data -->
</div>

<script src="ajax.js"></script>
<?php include('footer.html') ?>