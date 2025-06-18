<script>
	var type = '{{ $type ?? '' }}';
	if (type === 'promise') {
		$('.redirect_' + type, parent.document).text('PASS');
	} else {
		$('.redirect_' + type, parent.document).text('FAIL');
	}
</script>
