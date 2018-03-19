(function($){

	$(document).ready(function() {

		$('.js-remove-img').click(function(e) {
			e.preventDefault()
			$this = $(this)

			$img = $('#img'+ $this.data('id'));
			if ( $img.length ) {
				$img.remove();
			}
			$('#'+ $this.data('id')).val('');
		});
		
		$('.js-uploader').click(function(e){
			$this = $(this)
			e.preventDefault()
			var uploader = wp.media({
				title: 'Choisissez un fichier',
				button: {
					text: 'Choisissez un fichier'
				},
				multiple: false
			})

			uploader.on('select', function(){
				var selection = uploader.state().get('selection')

				var id = selection.map(function(item){
					return item.toJSON().id;
				})
				var value_id = id.join(',');
				$('#'+ $this.data('id')).val(value_id)

				var urls = selection.map(function(item){
					return item.toJSON().url;
				})
				var value_url = urls.join(',');

				$img = $('#img'+ $this.data('id'));
				if ( $img.length ) {
					$img.attr('src',value_url)
				}
				else {
					$('<img id="img'+$this.data('id')+'" src="'+value_url+'" style="display: block; max-width:100%; max-height:100%; vertical-align:middle;">')
						.insertBefore( $('#'+ $this.data('id')) )
				}
			})

			uploader.open()
		})

	})
})(jQuery)