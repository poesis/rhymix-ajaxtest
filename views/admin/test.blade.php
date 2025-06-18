@load ('test.scss')
@load ('test.js')

<div class="x_page-header">
	<h1>AJAX TEST</h1>
</div>

<table class="test">
	<tr>
		<th>Successful request to module.action with callback function</th>
		<td class="success_callback"></td>
	</tr>
	<tr>
		<th>Successful request to module.action with promise</th>
		<td class="success_promise"></td>
	</tr>
	<tr>
		<th>Successful request to raw URL with callback function</th>
		<td class="url_callback"></td>
	</tr>
	<tr>
		<th>Successful request to raw URL with promise</th>
		<td class="url_promise"></td>
	</tr>
	<tr>
		<th>Error with callback function (HTTP 200)</th>
		<td class="error_callback"></td>
	</tr>
	<tr>
		<th>Error with promise (HTTP 200)</th>
		<td class="error_promise"></td>
	</tr>
	<tr>
		<th>Error with callback function (HTTP 403)</th>
		<td class="error_callback_403"></td>
	</tr>
	<tr>
		<th>Error with promise (HTTP 403)</th>
		<td class="error_promise_403"></td>
	</tr>
	<tr>
		<th>Network error with callback</th>
		<td class="network_error_callback"></td>
	</tr>
	<tr>
		<th>Network error with promise</th>
		<td class="network_error_promise"></td>
	</tr>
	<tr>
		<th>Form submission success</th>
		<td class="form_submission_success"></td>
	</tr>
	<tr>
		<th>Form submission error</th>
		<td class="form_submission_error"></td>
	</tr>
	<tr>
		<th>Redirect with callback function</th>
		<td class="redirect_callback"></td>
	</tr>
	<tr>
		<th>Redirect with promise</th>
		<td class="redirect_promise"></td>
	</tr>
	<tr>
		<th>Redirect canceled with promise</th>
		<td class="redirect_canceled"></td>
	</tr>
	<tr>
		<th>Unhandled error</th>
		<td class="unhandled_error"></td>
	</tr>
</table>

<form id="test_form1" method="post" action="./" class="rx_ajax" style="display: none"
	data-callback-success="formSuccessCallback"
	data-callback-error="formErrorCallback">
	<input type="hidden" name="module" value="ajaxtest" />
	<input type="hidden" name="act" value="procAjaxtestFormSubmission" />
	<input type="hidden" name="test" value="FORMSUB_SUCCESS" />
	<button type="submit">Submit</button>
</form>

<form id="test_form2" method="post" action="./" class="rx_ajax" style="display:none"
	data-callback-success="formSuccessCallback"
	data-callback-error="formErrorCallback">
	<input type="hidden" name="module" value="ajaxtest" />
	<input type="hidden" name="act" value="procAjaxtestFormSubmission" />
	<input type="hidden" name="test" value="FORMSUB_ERROR" />
	<button type="submit">Submit</button>
</form>

<iframe id="redirect_test" src="@url([
	'module' => 'admin',
	'act' => 'dispAjaxtestRedirectSource',
	'layout' => 'none',
])" style="display:none"></iframe>
