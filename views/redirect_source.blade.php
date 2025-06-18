<script>
	// Allow the redirect to take effect inside the iframe.
	// The target page will set 'PASS' to the result display.
	// If it doesn't, we will consider it a failure after a while.
	function doRedirect() {
		const result_display = $('.redirect_promise', parent.document);
		Rhymix.ajax('ajaxtest.procAjaxtestRedirect', { type: 'promise' }).then(function(data) {
			setTimeout(function() {
				if (result_display.text().trim() === '') {
					result_display.text('FAIL')
				}
			}, 450);
		}).catch(function(err) {
			result_display.text('FAIL');
		});
	}
</script>
