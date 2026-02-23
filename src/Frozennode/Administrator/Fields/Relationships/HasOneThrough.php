<?php
namespace Frozennode\Administrator\Fields\Relationships;

use Illuminate\Database\Query\Builder as QueryBuilder;

class HasOneThrough extends Relationship {

	/**
	 * The relationship-type-specific defaults for the relationship subclasses to override
	 *
	 * @var array
	 */
	protected $relationshipDefaults = array(
		'editable' => false,
	);

	/**
	 * Builds a few basic options
	 */
	public function build()
	{
		parent::build();

		$options = $this->suppliedOptions;
		$model = $this->config->getDataModel();
		$relationship = $model->{$options['field_name']}();
		$related_model = $relationship->getRelated();

		// Store keys needed for filtering through intermediate table
		$options['table'] = $related_model->getTable();
		$options['column'] = $related_model->getKeyName();
		$options['through_table'] = $relationship->getParent()->getTable();
		$options['local_key'] = $relationship->getLocalKeyName();
		$options['first_key'] = $relationship->getFirstKeyName();
		$options['foreign_key'] = $relationship->getForeignKeyName();
		$options['second_local_key'] = $relationship->getSecondLocalKeyName();

		$this->suppliedOptions = $options;
	}

	/**
	 * Filters a query object with this item's data by joining through intermediate table
	 *
	 * @param \Illuminate\Database\Query\Builder	$query
	 * @param array|null							$selects
	 *
	 * @return void
	 */
	public function filterQuery(QueryBuilder &$query, &$selects = null)
	{
		parent::filterQuery($query, $selects);

		if (!$this->getOption('value'))
		{
			return;
		}

		$mainTable = $this->config->getDataModel()->getTable();
		$throughTable = $this->getOption('through_table');
		$localKey = $this->getOption('local_key');
		$firstKey = $this->getOption('first_key');
		$secondLocalKey = $this->getOption('second_local_key');

		// Join through intermediate table and filter by final relationship
		$query->join($throughTable, $mainTable . '.' . $localKey, '=', $throughTable . '.' . $firstKey)
			  ->where($throughTable . '.' . $secondLocalKey, '=', $this->getOption('value'));
	}
}
