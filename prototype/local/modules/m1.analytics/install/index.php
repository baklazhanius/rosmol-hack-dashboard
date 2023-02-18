<?

use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

if (class_exists('m1_analytics')) {
    return;
}

class m1_analytics extends \CModule
{
	public $MODULE_ID = "m1.analytics";
	public $MODULE_VERSION;
	public $MODULE_VERSION_DATE;
	public $MODULE_NAME;
	public $MODULE_DESCRIPTION;
    public $PARTNER_NAME;
    public $PARTNER_URI;
	public $MODULE_GROUP_RIGHTS = "Y";

	protected $models = [
		'Property',
		'Region',
	];

	function m1_analytics()
	{
		$arModuleVersion = [];

		$path = str_replace("\\", "/", __FILE__);
		$path = substr($path, 0, strlen($path) - strlen("/index.php"));
		include($path."/version.php");

		if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion)) {
			$this->MODULE_VERSION = $arModuleVersion["VERSION"];
			$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
		}

		$this->MODULE_NAME = Loc::getMessage("MODULE_NAME");
		$this->MODULE_DESCRIPTION = Loc::getMessage("MODULE_DESCRIPTION");

		$this->PARTNER_NAME = Loc::getMessage("SPER_PARTNER");
		$this->PARTNER_URI = Loc::getMessage("PARTNER_URI");
	}

	function InstallDB($arParams = array())
	{
		global $DB, $APPLICATION;
		\Bitrix\Main\ModuleManager::registerModule($this->MODULE_ID);
		if(\Bitrix\Main\Loader::includeModule($this->MODULE_ID)){	
			$connection = \Bitrix\Main\Application::getConnection();
			foreach ($this->models as $modelName) {
				$model = sprintf('\\M1\\Analytics\\Model\\%sTable', $modelName);
				$tableName = $model::getTableName();
				if(!$connection->isTableExists($tableName)) {
					$model::getEntity()->createDbTable();
				}
			}
		}
		return true;
	}

	function UnInstallDB($arParams = array())
	{
		global $APPLICATION, $DB, $DOCUMENT_ROOT;
		if(\Bitrix\Main\Loader::includeModule($this->MODULE_ID)){		
			$connection = \Bitrix\Main\Application::getConnection();
			foreach ($this->models as $modelName) {
				$model = sprintf('\\M1\\Analytics\\Model\\%sTable', $modelName);
				$tableName = $model::getTableName();
				if($connection->isTableExists($tableName)) {
					$connection->dropTable($tableName);
				}
			}
		}
		return true;
	}

	function InstallEvents()
	{
		return true;
	}

	function UnInstallEvents()
	{
		return true;
	}

	function InstallFiles($arParams = array())
	{
		return true;
	}

	function UnInstallFiles()
	{
		return true;
	}

	function DoInstall()
	{
		global $DOCUMENT_ROOT, $APPLICATION;
		$this->InstallFiles();
		$this->InstallDB();
		\CModule::IncludeModule($this->MODULE_ID);
	}

	function DoUninstall()
	{
		global $DOCUMENT_ROOT, $APPLICATION, $step, $errors;
		$this->UnInstallDB();
		$this->UnInstallFiles();
		\UnRegisterModule($this->MODULE_ID);
	}
}
?>