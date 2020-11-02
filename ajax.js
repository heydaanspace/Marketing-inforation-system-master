$('##con-close-modal').on('shown.bs.modal', function(e) {
  $.ajax({
    method: "POST",
    url: "getData.php",
    data: {
      dataId: $('#myModal').attr('data-id')
    },
    success: function(data) {
      data = jQuery.parseJSON(data);

        $('.modal-body', '#myModal').html(data);

    }
  });
})