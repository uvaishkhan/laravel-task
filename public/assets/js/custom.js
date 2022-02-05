var a = 0;
$(window).scroll(function() {

  var oTop = $('#counter').offset()?.top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.counter-value').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    a = 1;
  }

});

// multiselect

$(document).ready(function () {
    $(document).on('click', '.delete-action', function () {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
            if (willDelete) {
                const id = $(this).data('id');
                const url = $(this).data('action_url');
                const method = $(this).data('method');
                var form_data = new FormData();
                form_data.append("id", id);
                const token = $('meta[name=csrf-token]').attr('content');
                form_data.append("_token", token);
                $(".modal-body").empty();
                $.ajax({
                    url: url,
                    data: form_data,
                    type: method,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $(`#del-${id}`).remove();
                        console.log(data.name);
                        swal("File deleted successfully.", {
                            icon: "success",
                        });
                    }
                });
            } else {
                // swal("Poof! Your imaginary file has been deleted!", {
                //     icon: "success",
                // });
            }
        });
    });
});
// Trigger Form Submit on click of Apply button
$(document).on("click", "#applyfilter", function () {
    $("#FrontAjaxSearch").submit();
});
$(document).on("click", ".form-global-Searchbtn", function () {
    $("#form-global-Search").submit();
});


