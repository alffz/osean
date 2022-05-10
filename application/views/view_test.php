<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<div class="container m-3">
  <div class="row">
    <!-- jika input type berubah maka ubah isi dari option dari ajax -->
    <button class="btn btn-sm btn-success" id="klik" onclick="processData()">proses data</button>
    <br>
    <p id="paragrap">tes</p>
    <label for="">Plus</label>
    <input type="number" onkeyup="plus(this.value)" class="form-control" style="width: 100px;" name="counter" id="tambah">
    <br>
    <label for="">min</label>
    <input type="number" class="form-control" style="width: 100px;" name="counter" id="kurang">
  </div>
</div>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Pelanggan</th>
      <th>Gang</th>
      <th>Galon</th>
      <th>cash</th>
      <th>bayar hutang</th>
      <th>hutang</th>
      <th>bayar hutang kupon</th>
      <th>bayar pake kupon</th>
      <th>sisa hutang</th>
      <th>harga</th>
      <th>total</th>
    </tr>
  </thead>
  <tbody onload="setAttrTD()">
    <?php $no = 1;
    foreach ($pelanggan as $p) : ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $p->nama_pelanggan ?></td>
        <td><?= $p->nama_gang ?></td>
        <td>
          <input id="tambahh" onkeyup="plus()" data-id=" <?= $p->id_pelanggan ?>" value="<?= $p->id_pelanggan ?>" type="text" class="text">
        </td>
        <td>
          <input type="text" class="1">
        </td>
        <td>
          <input type="number" class="text">
        </td>
        <td>
          <input type="number" class="text">
        </td>
        <td>
          <input type="number" class="text">
        </td>
        <td>
          <input type="number" class="text">
        </td>
        <td>
          <input type="number" class="text">
        </td>
        <td id="harga"><?= $p->harga ?></td>
        <td></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php var_dump($this->cart->total_items()) ?>
<script>
  // // get value of element
  function getValue($str) {
    const harga = 4500;
    const total = $str * harga;
    console.log(total);
    // get by class name
    // get value of element
    const valueof = document.getElementsByClassName('text');
    const td = document.getElementsByClassName('1');
    //loop td
    for (let i = 0; i < td.length; i++) {
      td[i].value = total;
    }
    // td.setAttribute("value", total);/

  }

  // // onload tbody set attribute td
  // function setAttrTD() {
  //   var td = document.getElementsByTagName('td');
  //   // for (var i = 0; i < td.length; i++) {
  //   //   td[i].setAttribute('class', 'baru');
  //   td.setAttribute('class', 'baru');
  //   // }
  // }

  // // when keyup on element run ajax
  function plus($str) {
    const tambah = document.getElementById("tambah");

    // run ajax
    $.ajax({
      url: "<?= base_url('test/add_cart') ?>",
      type: "POST",
      data: {
        tambahh: tambah.dataset.id
      },
      success: function(data) {
        // alert
        alert('success');
        // document.getElementById("paragrap").innerHTML = data;
      }
    });
  }

  // // onkey up jquery
  // $("#kurang").on("keyup", function() {
  //   $(this).attr("value", $(this).val());
  // });


  // const tr = document.querySelectorAll("tr");
  // // get child of tr
  // const td = document.querySelectorAll("tr td");
</script>