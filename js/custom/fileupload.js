jQuery(function($) {
  var dropzone = $('.upload-image');

  dropzone.on('dragenter', function(e) {
    e.preventDefault();
    $(this).css('border', '2px solid #0B85A1');
  });

  dropzone.on('drop', function(e) {
    e.preventDefault();
    $(this).css('border', '2px solid #0B85A1');

    var files = e.originalEvent.dataTransfer.files;
    handleFileUpload(files);
  });

  // Avoid file being opened in browser

  $(document).on('dragenter', function (e)
  {
    e.stopPropagation();
    e.preventDefault();
  });
  $(document).on('dragover', function (e)
  {
    e.stopPropagation();
    e.preventDefault();
    dropzone.css('border', '2px dotted #0B85A1');
  });
  $(document).on('drop', function (e)
  {
    e.stopPropagation();
    e.preventDefault();
  });

  // HTML5 Formdata()

  function handleFileUpload(files){
     for (var i = 0; i < files.length; i++)
     {
        var fd = new FormData();
        fd.append('file', files[i]);
        sendFileToServer(fd);
     }
  }

  function sendFileToServer(formData){
    console.log(formData);
  }

});
