<form action="" method="post" id="formCropGambar" enctype="multipart/form-data">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Crop Gambar <small>(optional)</small></h4>
          </div>
          <div class="modal-body">
              <p class="bg-primary" style="padding:5px"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>  Crop/resize gambar untuk mengurangi ukuran file</p>
              <div>
                  <img src="" id="imgReadyCrop">
                  <input type="submit" class="hidden">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary getCropButton">Crop</button>
          </div>
        </div>
      </div>
    </div>
</form>
