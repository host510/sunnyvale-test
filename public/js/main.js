$(document).ready(function(){

    var newhtml = $('footer h2').html();
    $('header h2').html(newhtml);

    $('.adel').click(function(){  
      $.ajax({
        type: "POST",
        cache: false,
        url: "",
        context: this,
        dataType: "html",
        data: ({del_id : this.getAttribute('itid')}),
        success: function(){
          $(this).closest('.showstory').html("Новость удалена!");

        }
      });
    });

            $('.apr').click(function(){  
              $.ajax({
                type: "POST",
                cache: false,
                url: "",
                context: this,
                dataType: "html",
                data: ({apr_id : this.getAttribute('itid')}),
                success: function(){
                  $(this).closest('.showstory').html("Новость одобрена!");

                }
              });
            });
});