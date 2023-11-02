function showToast(type,judul,message){
	switch(type.toLowerCase()){
		case "success":
			$.growl.notice({
				title: judul,
				message: message
			});
			break;
		case "warning":
			$.growl.warning({
				title: judul,
				message: message
			});
			break;
		case "danger":
			$.growl.error({
				title: judul,
				message: message
			});
			break;
		default:
			$.growl({
				title: judul,
				message: message
			});
	}
}
