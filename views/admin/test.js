$(function() {

	const testdata = { 'test': 'AJAXTEST' };

	const tests = {

		// Normal AJAX request
		success_callback: function(result_display) {
			Rhymix.ajax('ajaxtest.procAjaxtestNormalResult', testdata, function(data) {
				if (data.test_result === testdata.test) {
					result_display.text('PASS');
				} else {
					result_display.text('FAIL');
				}
			});
		},

		// Normal AJAX request using Promise
		success_promise: function(result_display) {
			Rhymix.ajax('ajaxtest.procAjaxtestNormalResult', testdata).then(function(data) {
				if (data.test_result === testdata.test) {
					result_display.text('PASS');
				} else {
					result_display.text('FAIL');
				}
			});
		},

		// Error handling with callback
		error_callback: function(result_display) {
			Rhymix.ajax('ajaxtest.procAjaxtestErrorResult', testdata, function(data) {
				result_display.text('FAIL');
			}, function(data) {
				if (data.message === 'AJAXTEST_ERROR_MESSAGE') {
					result_display.text('PASS');
				} else {
					result_display.text('FAIL');
				}
				return false;
			});
		},

		// Error handling with Promise
		error_promise: function(result_display) {
			Rhymix.ajax('ajaxtest.procAjaxtestErrorResult', testdata).then(function(data) {
				result_display.text('FAIL');
			}).catch(function(err) {
				if (err.cause.message === 'AJAXTEST_ERROR_MESSAGE') {
					result_display.text('PASS');
				} else {
					result_display.text('FAIL');
				}
			});
		},

		// Error handling with callback, non-200 HTTP status code
		error_callback_403: function(result_display) {
			Rhymix.ajax('ajaxtest.procAjaxtestErrorCode403', testdata, function(data) {
				result_display.text('FAIL');
			}, function(data) {
				if (data.message === 'AJAXTEST_ERROR_MESSAGE') {
					result_display.text('PASS');
				} else {
					result_display.text('FAIL');
				}
				return false;
			});
		},

		// Error handling with Promise, non-200 HTTP status code
		error_promise_403: function(result_display) {
			Rhymix.ajax('ajaxtest.procAjaxtestErrorCode403', testdata).then(function(data) {
				result_display.text('FAIL');
			}).catch(function(err) {
				if (err.cause.message === 'AJAXTEST_ERROR_MESSAGE') {
					result_display.text('PASS');
				} else {
					result_display.text('FAIL');
				}
			});
		},

		// Submit form with .rx_ajax class and wait for success callback
		form_submission_success: function(result_display) {
			$('#test_form1').submit();
		},

		// Submit form with .rx_ajax class and wait for error callback
		form_submission_error: function(result_display) {
			$('#test_form2').submit();
		},

		// No redirect, because callback function takes priority over redirect
		redirect_callback: function(result_display) {
			Rhymix.ajax('ajaxtest.procAjaxtestRedirect', { type: 'callback' }, function(data) {
				setTimeout(function() {
					result_display.text('PASS');
				}, 150);
			});
		},

		// Redirect, because resolve function has a lower priority than redirect
		redirect_promise: function(result_display) {
			document.getElementById('redirect_test').contentWindow.doRedirect();
		},

		// Redirect canceled by Rhymix.cancelPendingRedirect()
		redirect_canceled: function(result_display) {
			Rhymix.ajax('ajaxtest.procAjaxtestRedirect', { type: 'cancel' }).then(function(data) {
				Rhymix.cancelPendingRedirect();
				setTimeout(function() {
					result_display.text('PASS');
				}, 150);
			});
		},

		// Unhandled error (alert by default)
		unhandled_error: function(result_display) {
			const original_alert = window.alert;
			window.alert = function(msg) {
				if (msg === 'AJAXTEST_ERROR_MESSAGE') {
					result_display.text('PASS');
				} else {
					result_display.text('FAIL');
				}
				window.alert = original_alert;
			};
			Rhymix.ajax('ajaxtest.procAjaxtestErrorResult', testdata);
		}
	};

	let delay = 300;
	for (let name in tests) {
		setTimeout(function() {
			const result_display = $('.' + name);
			tests[name](result_display);
		}, delay);
		delay += 300;
	}

});

function formSuccessCallback(data) {
	if (data.test_result === 'FORMSUB_SUCCESS') {
		$('.form_submission_success').text('PASS');
	} else {
		$('.form_submission_success').text('FAIL');
	}
}

function formErrorCallback(data) {
	if (data.message === 'FORMSUB_ERROR') {
		$('.form_submission_error').text('PASS');
	} else {
		$('.form_submission_error').text('FAIL');
	}
	return false;
}
