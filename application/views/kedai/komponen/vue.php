<script type="text/x-template" id="modal-template">
    <form :id="idForm">
      <table class="table table-striped how-how">
          <input type="hidden" name="meja-id-pesanan" :value="idPesanan">
          <tr>
              <td>Status Pemesanan</td>
              <td class="meja-status-pesanan-sekarang">{{ statusSekarang }}</td>
          </tr>
          <tr>
              <td>Menu</td>
              <td class="meja-menu-pesanan">{{ menu }}</td>
          </tr>
          <tr>
              <td>Jumlah Pemesanan</td>
              <td class="meja-jumlah-pesanan">{{ jumlah }}</td>
          </tr>
          <tr>
              <td>Total Harga</td>
              <td class="meja-total-pesanan">{{ totalHarga }}</td>
          </tr>
          <tr>
              <td>Waktu Pemesanan</td>
              <td class="meja-waktu-pesanan">{{ waktuPesanan }}</td>
          </tr>
          <tr>
              <td>Update Status</td>
              <td class="meja-status-pesanan">
                    <div class="radio">
                      <label><input type="radio" name="optradio" value="Belum Di Konfirmasi">Belum Di Konfirmasi</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio" name="optradio" value="Sudah Di Konfirmasi">Sudah Di Konfirmasi</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio" name="optradio" value="Sedang Di Masak">Sedang Di Masak</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio" name="optradio" value="Selesai">Selesai</label>
                    </div>
              </td>
          </tr>
      </table>
      <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
    </form>
</script>
