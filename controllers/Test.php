<?php

namespace Rhymix\Modules\Ajaxtest\Controllers;

use BaseObject;
use Context;

/**
 * AJAX 테스트
 *
 * Copyright (c) POESIS
 *
 * Generated with https://www.poesis.dev/tools/rxmodulegen
 */
class Test extends Base
{
	/**
	 * 정상 결과 예제
	 */
	public function procAjaxtestNormalResult()
	{
		$this->add('test_result', Context::get('test'));
	}

	/**
	 * 에러 결과 예제 (HTTP 200)
	 */
	public function procAjaxtestErrorResult()
	{
		$this->setError(-1);
		$this->setMessage('AJAXTEST_ERROR_MESSAGE');
	}

	/**
	 * 에러 결과 예제 (HTTP 403)
	 */
	public function procAjaxtestErrorCode403()
	{
		header('HTTP/1.1 403 Forbidden');
		$this->procAjaxtestErrorResult();
	}

	/**
	 * 폼 제출 예제
	 */
	public function procAjaxtestFormSubmission()
	{
		$test = Context::get('test');
		if ($test === 'FORMSUB_SUCCESS')
		{
			$this->add('test_result', $test);
		}
		else
		{
			return new BaseObject(-1, 'FORMSUB_ERROR');
		}
	}

	/**
	 * 리다이렉트 예제
	 */
	public function procAjaxtestRedirect()
	{
		$this->setRedirectUrl(getNotEncodedUrl([
			'module' => 'ajaxtest',
			'act' => 'dispAjaxtestRedirectTarget',
			'type' => Context::get('type'),
		]));
	}

	/**
	 * 리다이렉트 원본 예제
	 */
	public function dispAjaxtestRedirectSource()
	{
		$this->setTemplatePath($this->module_path . 'views');
		$this->setTemplateFile('redirect_source');
	}

	/**
	 * 리다이렉트 대상 예제
	 */
	public function dispAjaxtestRedirectTarget()
	{
		$this->setTemplatePath($this->module_path . 'views');
		$this->setTemplateFile('redirect_target');
	}
}
