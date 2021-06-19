<div id="photo-update" tabindex="-1" role="dialog" aria-labelledby="upload" aria-hidden="true" class="modal fade">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">image preview</h5>
            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" >x</span></button>
         </div>
         <div class="modal-body">
            <div id="disp_update_photo"></div>
            <!--	<input type="hidden" name="imagepath" id="imagepath" value="" > -->
         </div>
      </div>
   </div>
</div>
<div id="photo-insert" tabindex="-1" role="dialog" aria-labelledby="upload" aria-hidden="true" class="modal fade">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">image preview</h5>
            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" >x</span></button>
         </div>
         <div class="modal-body">
            <form method="POST" name="photoupdate" id="photoupdate" enctype="multipart/form-data">
               <a class='btn btn-primary' onClick="AddUploadbtn();">upload</a>
            </form>
            <!--	<input type="hidden" name="imagepath" id="imagepath" value="" > -->
         </div>
      </div>
   </div>
</div>
<div id="blog-edit" tabindex="-1" role="dialog" aria-labelledby="upload" aria-hidden="true" class="modal fade">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit Blog</h5>
            <button type="button" id="blogboxclose" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" >x</span></button>
         </div>
         <div class="modal-body">
            <img id='blogimage' name="blogimage" src='' height='70%' width='70%'>        
            <form method="POST" id="blogupdate" enctype="multipart/form-data" class="form-control">
               <div id="dblogedittitle"><input class="form-control" type="text" id="blogedittitle" name="blogedittitle" value="" id="title" placeholder="Title"></div>
               <textarea class="form-control" id="blogdescription" name="blogdescription" placeholder="description" ></textarea>
               <input class="form-control" type="file" id="blogimage" name="blogimage" id="blogimage" >
               <a class='btn btn-primary' id="photo" onClick="blogup();" data-dismiss="modal" aria-label="Close" class="close">upload</a>
               <input type="hidden" name="blogpath" value="" id="blogpath" >
               <input type="hidden" name="blogid" value="" id="blogid" >
            </form>
         </div>
      </div>
   </div>
</div>
<div id="blog-insert" tabindex="-1" role="dialog" aria-labelledby="upload" aria-hidden="true" class="modal fade">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Insert Blog</h5>
            <button type="button" id="insblogclose" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" >x</span></button>
         </div>
         <div class="modal-body">
            <form method="POST" id="insertblog" name="insertblog" enctype="multipart/form-data" class="form-control">
               <div><input class="form-control" type="text" id="insblogtitle" name="insblogtitle" value="" id="title" placeholder="Title"></div>
               <textarea class="form-control" id="insblogdescription" name="insblogdescription" placeholder="description" ></textarea>
               <input class="form-control" type="file" id="insblogimage" name="insblogimage" id="blogimage" >
               <a class='btn btn-primary' id="photo" onClick="blogadd();" name="addbtn" value='blogadd' data-dismiss="modal" aria-label="Close" class="close">Add</a>
            </form>
         </div>
      </div>
   </div>
</div>