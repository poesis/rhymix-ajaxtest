<?php

namespace Rhymix\Modules\Ajaxtest\Controllers;

use Rhymix\Framework\Cache;
use Rhymix\Framework\DB;
use Rhymix\Framework\Exception;
use Rhymix\Framework\Storage;
use BaseObject;
use Context;
use ModuleController;
use ModuleModel;

/**
 * AJAX 테스트
 *
 * Copyright (c) POESIS
 *
 * Generated with https://www.poesis.dev/tools/rxmodulegen
 */
class Admin extends Base
{
	/**
	 * 관리자용 테스트 화면
	 */
	public function dispAjaxtestAdminTest()
	{
		$this->setTemplatePath($this->module_path . 'views/admin');
		$this->setTemplateFile('test');
	}
}
