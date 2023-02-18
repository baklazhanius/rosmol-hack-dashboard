<?php
namespace M1\Analytics\Model;

use Bitrix\Main,
	Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

/**
 * Class PropertyTable
 * 
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> OBJECT_TYPE string optional
 * <li> OBJECT_ID string optional
 * <li> NAME string optional
 * <li> VALUE string optional
 * <li> YEAR int optional
 * <li> CREATED datetime optional
 * <li> UPDATED datetime optional
 * </ul>
 *
 * @package M1\Analytics
 **/

class PropertyTable extends Main\Entity\DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'm1_analytics_property';
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 */
	public static function getMap()
	{
		return array(
			'ID' => array(
				'data_type' => 'integer',
				'primary' => true,
				'autocomplete' => true,
				'title' => Loc::getMessage('PROPERTY_ENTITY_ID_FIELD'),
			),
			'OBJECT_TYPE' => array(
				'data_type' => 'text',
				'title' => Loc::getMessage('PROPERTY_ENTITY_OBJECT_TYPE_FIELD'),
			),
			'OBJECT_ID' => array(
				'data_type' => 'text',
				'title' => Loc::getMessage('PROPERTY_ENTITY_OBJECT_ID_FIELD'),
			),
			'NAME' => array(
				'data_type' => 'text',
				'title' => Loc::getMessage('PROPERTY_ENTITY_NAME_FIELD'),
			),			
			'VALUE' => array(
				'data_type' => 'text',
				'title' => Loc::getMessage('PROPERTY_ENTITY_VALUE_FIELD'),
			),			
			'YEAR' => array(
				'data_type' => 'integer',
				'title' => Loc::getMessage('PROPERTY_ENTITY_ATTEMPTS_FIELD'),
			),
			'CREATED' => array(
				'data_type' => 'datetime',
				'title' => Loc::getMessage('PROPERTY_ENTITY_CREATED_FIELD'),
			),
			'UPDATED' => array(
				'data_type' => 'datetime',
				'title' => Loc::getMessage('PROPERTY_ENTITY_UPDATED_FIELD'),
			),
		);
	}
}