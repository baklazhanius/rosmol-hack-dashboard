<?php
namespace M1\Analytics\Model;

use Bitrix\Main\Localization\Loc,
	Bitrix\Main\ORM\Data\DataManager,
	Bitrix\Main\ORM\Fields\DatetimeField,
	Bitrix\Main\ORM\Fields\IntegerField,
	Bitrix\Main\ORM\Fields\StringField;

Loc::loadMessages(__FILE__);

/**
 * Class RegionTable
 * 
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> PARENT_ID int optional
 * <li> NAME text optional
 * <li> REMOTE_SERVER text optional
 * <li> DEPTH int optional
 * <li> DATA_START datetime optional
 * <li> DATA_END datetime optional
 * <li> CREATED datetime optional
 * <li> UPDATED datetime optional
 * </ul>
 *
 * @package M1\Analytics
 **/

class RegionTable extends DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'm1_analytics_region';
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 */
	public static function getMap()
	{
		return [
			new IntegerField(
				'ID',
				[
					'primary' => true,
					'autocomplete' => true,
					'title' => Loc::getMessage('REGION_ENTITY_ID_FIELD')
				]
			),
			new IntegerField(
				'PARENT_ID',
				[
					'title' => Loc::getMessage('REGION_ENTITY_PARENT_ID_FIELD')
				]
			),
			new StringField(
				'NAME',
				[
					'size' => '100',
					'title' => Loc::getMessage('REGION_ENTITY_NAME_FIELD')
				]
			),			
			new IntegerField(
				'DEPTH',
				[
					'title' => Loc::getMessage('REGION_ENTITY_DEPTH_FIELD')
				]
			),
			new DatetimeField(
				'CREATED',
				[
					'title' => Loc::getMessage('REGION_ENTITY_CREATED_FIELD')
				]
			),
			new DatetimeField(
				'UPDATED',
				[
					'title' => Loc::getMessage('REGION_ENTITY_UPDATED_FIELD')
				]
			),
		];
	}
}