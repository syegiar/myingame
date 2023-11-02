$("#fprofile").on('submit', function(e){
e.preventDefault();

NProgress.start();
$('.waves-effect').prop('disabled',true);
$('.icon-submit').removeClass('fa-yelp')
$('.icon-submit').addClass('fa-circle-o-notch');
$('.icon-submit').addClass('fa-spin');
var fd = {
id: $('#idi').val(),
gambar: $('#ifoto').val(),
username: $('#iusername').val(),
role: $('#irole').val(),
name: $('#iname').val(),
bdate: $('#ibdate').val(),
address: $('#iaddress').val(),
description: $('#idescription').val()
}
$.post('<?= base_url('api/profile') ?>',fd).done(function(dt){
console.log(dt.status);
if(dt.status == 200){
window.location.reload();
$('.icon-submit').removeClass('fa-spin');
$('.icon-submit').removeClass('fa-circle-o-notch');
$('.icon-submit').addClass('fa-yelp')
$('.waves-effect').prop('disabled',false);
NProgress.done();
}else{
alert('gagal:'+dt.message);
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