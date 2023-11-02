$("#flogin").on('submit', function(e){
  
  NProgress.start();
	$('.waves-effect').prop('disabled',true);
	$('.icon-submit').addClass('fa-circle-o-notch');
	$('.icon-submit').addClass('fa-spin');
        fd = {
        username: $('#iusername').val(),
        password: $('#ipassword').val()
    }
    $.post('<?=base_url('api/login')?>',fd).done(function(dt){
        if(dt.status == 200){
        alert('berhasil');
        }else{
        alert('failed to login');
        }
    }).fail(function(){
        alert('Cannot access to api right now');
    })
 });

