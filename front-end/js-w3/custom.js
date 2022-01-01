/*----- Subscription Form ----- */
$(document).ready(function() {
     // jQuery Validation
     $("#chimp-form").validate({
         // if valid, post data via AJAX
         submitHandler: function(form) {
             $.post("/front-end/mailchimp/subscribe.php", { email: $("#chimp-email").val() }, function(data) {
                 $('#response').html(data);
             });
         },
         // all fields are required
         rules: {
             email: {
                 required: true,
                 email: true
             }
         }
     });
 });