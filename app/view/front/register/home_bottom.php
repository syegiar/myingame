$("#flogin").on('submit', function(e){
  
    NProgress.start();
      $('.waves-effect').prop('disabled',true);
      $('.icon-submit').removeClass('fa-yelp')
      $('.icon-submit').addClass('fa-circle-o-notch');
      $('.icon-submit').addClass('fa-spin');
          var fd = {
          nama: $('#inama').val(),
          email: $('#iemail').val(),
          password: $('#ipassword').val(),
          password_verify: $('#ipassword_konfirmasi').val()
      }
      $.post('<?=base_url('api/register')?>',fd).done(function(dt){
          console.log(dt.status);
          if(dt.status == 200){
          windows.location=dt.redirect_url;
          $('.icon-submit').removeClass('fa-spin');
          $('.icon-submit').removeClass('fa-circle-o-notch');
          $('.icon-submit').addClass('fa-yelp')
          $('.waves-effect').prop('disabled',false);
          NProgress.done();
          }else{
          alert('gagal');
          $('.icon-submit').removeClass('fa-spin');
          $('.icon-submit').removeClass('fa-circle-o-notch');
          $('.icon-submit').addClass('fa-yelp')
          $('.waves-effect').prop('disabled',false);
          NProgress.done();
          }
      }).fail(function(){
          alert('Cannot access to api right now');
          $('.icon-submit').removeClass('fa-spin');
          $('.icon-submit').removeClass('fa-circle-o-notch');
          $('.icon-submit').addClass('fa-yelp')
          $('.waves-effect').prop('disabled',false);
          NProgress.done();
      })
   });