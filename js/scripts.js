jQuery(document).ready(function($) {
	if ( $('.card').length ){
		$('.card-body').matchHeight({
			byRow: true,
		});
	}
});