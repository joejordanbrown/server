<?php

class SphinxEntryCriteria extends SphinxCriteria
{
	public static $sphinxFields = array(
		entryPeer::ID => 'int_entry_id',
		entryPeer::NAME => 'name',
		entryPeer::TAGS => 'tags',
		entryPeer::CATEGORIES_IDS => 'categories',
		entryPeer::FLAVOR_PARAMS_IDS => 'flavor_params',
		entryPeer::SOURCE_LINK => 'source_link',
		entryPeer::KSHOW_ID => 'kshow_id',
		entryPeer::GROUP_ID => 'group_id',
		entryPeer::DESCRIPTION => 'description',
		entryPeer::ADMIN_TAGS => 'admin_tags',
		'plugins_data',
		'entry.DURATION_TYPE' => 'duration_type',
		'entry.REFERENCE_ID' => 'reference_id',
		'entry.REPLACING_ENTRY_ID' => 'replacing_entry_id',
		'entry.REPLACED_ENTRY_ID' => 'replaced_entry_id',
		'entry.SEARCH_TEXT' => '(name,tags,description,entry_id,reference_id)',
		'entry.ROOTS' => 'roots',
		
		entryPeer::KUSER_ID => 'kuser_id',
		entryPeer::STATUS => 'entry_status',
		entryPeer::TYPE => 'type',
		entryPeer::MEDIA_TYPE => 'media_type',
		entryPeer::VIEWS => 'views',
		entryPeer::PARTNER_ID => 'partner_id',
		entryPeer::MODERATION_STATUS => 'moderation_status',
		entryPeer::DISPLAY_IN_SEARCH => 'display_in_search',
		entryPeer::LENGTH_IN_MSECS => 'duration',
		entryPeer::ACCESS_CONTROL_ID => 'access_control_id',
		entryPeer::MODERATION_COUNT => 'moderation_count',
		entryPeer::RANK => 'rank',
		entryPeer::PLAYS => 'plays',
		'entry.PARTNER_SORT_VALUE' => 'partner_sort_value',
		'entry.REPLACEMENT_STATUS' => 'replacement_status',
		
		entryPeer::CREATED_AT => 'created_at',
		entryPeer::UPDATED_AT => 'updated_at',
		entryPeer::MODIFIED_AT => 'modified_at',
		entryPeer::MEDIA_DATE => 'media_date',
		entryPeer::START_DATE => 'start_date',
		entryPeer::END_DATE => 'end_date',
		entryPeer::AVAILABLE_FROM => 'available_from',
	);
	
	public static $sphinxOrderFields = array(
		entryPeer::NAME => 'sort_name',
		
		entryPeer::KUSER_ID => 'kuser_id',
		entryPeer::STATUS => 'entry_status',
		entryPeer::TYPE => 'type',
		entryPeer::MEDIA_TYPE => 'media_type',
		entryPeer::VIEWS => 'views',
		entryPeer::PARTNER_ID => 'partner_id',
		entryPeer::MODERATION_STATUS => 'moderation_status',
		entryPeer::DISPLAY_IN_SEARCH => 'display_in_search',
		entryPeer::LENGTH_IN_MSECS => 'duration',
		entryPeer::ACCESS_CONTROL_ID => 'access_control_id',
		entryPeer::MODERATION_COUNT => 'moderation_count',
		entryPeer::RANK => 'rank',
		entryPeer::PLAYS => 'plays',
		'entry.PARTNER_SORT_VALUE' => 'partner_sort_value',
		
		entryPeer::CREATED_AT => 'created_at',
		entryPeer::UPDATED_AT => 'updated_at',
		entryPeer::MODIFIED_AT => 'modified_at',
		entryPeer::MEDIA_DATE => 'media_date',
		entryPeer::START_DATE => 'start_date',
		entryPeer::END_DATE => 'end_date',
		entryPeer::AVAILABLE_FROM => 'available_from',
	);
	
	public static $sphinxTypes = array(
		'entry_id' => IIndexable::FIELD_TYPE_STRING,
		'name' => IIndexable::FIELD_TYPE_STRING,
		'tags' => IIndexable::FIELD_TYPE_STRING,
		'categories' => IIndexable::FIELD_TYPE_STRING,
		'flavor_params' => IIndexable::FIELD_TYPE_STRING,
		'source_link' => IIndexable::FIELD_TYPE_STRING,
		'kshow_id' => IIndexable::FIELD_TYPE_STRING,
		'group_id' => IIndexable::FIELD_TYPE_STRING,
		'metadata' => IIndexable::FIELD_TYPE_STRING,
		'duration_type' => IIndexable::FIELD_TYPE_STRING,
		'reference_id' => IIndexable::FIELD_TYPE_STRING,
		'replacing_entry_id' => IIndexable::FIELD_TYPE_STRING,
		'replaced_entry_id' => IIndexable::FIELD_TYPE_STRING,
		'(name,tags,description,entry_id,reference_id)' => IIndexable::FIELD_TYPE_STRING,
		'roots' => IIndexable::FIELD_TYPE_STRING,
		
		'int_entry_id' => IIndexable::FIELD_TYPE_INTEGER,
		'kuser_id' => IIndexable::FIELD_TYPE_INTEGER,
		'entry_status' => IIndexable::FIELD_TYPE_INTEGER,
		'type' => IIndexable::FIELD_TYPE_INTEGER,
		'media_type' => IIndexable::FIELD_TYPE_INTEGER,
		'views' => IIndexable::FIELD_TYPE_INTEGER,
		'partner_id' => IIndexable::FIELD_TYPE_INTEGER,
		'moderation_status' => IIndexable::FIELD_TYPE_INTEGER,
		'display_in_search' => IIndexable::FIELD_TYPE_INTEGER,
		'duration' => IIndexable::FIELD_TYPE_INTEGER,
		'access_control_id' => IIndexable::FIELD_TYPE_INTEGER,
		'moderation_count' => IIndexable::FIELD_TYPE_INTEGER,
		'rank' => IIndexable::FIELD_TYPE_INTEGER,
		'plays' => IIndexable::FIELD_TYPE_INTEGER,
		'partner_sort_value' => IIndexable::FIELD_TYPE_INTEGER,
		'replacement_status' => IIndexable::FIELD_TYPE_INTEGER,
		
		'created_at' => IIndexable::FIELD_TYPE_DATETIME,
		'updated_at' => IIndexable::FIELD_TYPE_DATETIME,
		'modified_at' => IIndexable::FIELD_TYPE_DATETIME,
		'media_date' => IIndexable::FIELD_TYPE_DATETIME,
		'start_date' => IIndexable::FIELD_TYPE_DATETIME,
		'end_date' => IIndexable::FIELD_TYPE_DATETIME,
		'available_from' => IIndexable::FIELD_TYPE_DATETIME,
	);

	/**
	 * @return criteriaFilter
	 */
	protected function getDefaultCriteriaFilter()
	{
		return entryPeer::getCriteriaFilter();
	}
	
	/**
	 * @return string
	 */
	protected function getSphinxIndexName()
	{
		return kSphinxSearchManager::getSphinxIndexName(entryPeer::TABLE_NAME);;
	}
	
	protected function executeSphinx($index, $wheres, $orderBy, $limit, $maxMatches, $setLimit)
	{
		$sql = "SELECT str_entry_id FROM $index $wheres $orderBy LIMIT $limit OPTION max_matches=$maxMatches";
		
		//debug query
		//echo $sql."\n"; die;
		$pdo = DbManager::getSphinxConnection();
		$stmt = $pdo->query($sql);
		if(!$stmt)
		{
			KalturaLog::err("Invalid sphinx query [$sql]");
			return;
		}
		
		$ids = $stmt->fetchAll(PDO::FETCH_COLUMN, 2);
		$ids = $this->applyIds($ids);
		$this->setFetchedIds($ids);
		KalturaLog::debug("Found " . count($ids) . " ids");
		
		foreach($this->keyToRemove as $key)
		{
			KalturaLog::debug("Removing key [$key] from criteria");
			$this->remove($key);
		}
		
		$this->addAnd(entryPeer::ID, $ids, Criteria::IN);
		
		$this->recordsCount = 0;
		
		if(!$this->doCount)
			return;
			
		if($setLimit)
		{
			$this->setOffset(0);
			
			$sql = "show meta";
			$stmt = $pdo->query($sql);
			$meta = $stmt->fetchAll(PDO::FETCH_NAMED);
			if(count($meta))
			{
				foreach($meta as $metaItem)
				{
					KalturaLog::debug("Sphinx query " . $metaItem['Variable_name'] . ': ' . $metaItem['Value']);
					if($metaItem['Variable_name'] == 'total_found')
						$this->recordsCount = (int)$metaItem['Value'];
				}
			}
		}
		else
		{
			$c = clone $this;
			$c->setLimit(null);
			$c->setOffset(null);
			$this->recordsCount = entryPeer::doCount($c);
		}
	}
	
	/**
	 * Applies all filter fields and unset the handled fields
	 * 
	 * @param baseObjectFilter $filter
	 */
	protected function applyFilterFields(baseObjectFilter $filter)
	{
		$matchAndCats = $filter->get("_matchand_categories");
		if ($matchAndCats !== null)
		{
			//if the category exist or the category name is an empty string
			if ( $filter->categoryNamesToIds ( $matchAndCats )!=='' || $matchAndCats =='')
				$filter->set ( "_matchand_categories_ids", $filter->categoryNamesToIds ( $matchAndCats ) );
			else
		  		$filter->set ( "_matchand_categories_ids", category::CATEGORY_ID_THAT_DOES_NOT_EXIST);
			$filter->unsetByName('_matchand_categories');
		}

		
		$matchOrCats = $filter->get("_matchor_categories");
		if ($matchOrCats !== null)
		{
			//if the category exist or the category name is an empty string
			if( $filter->categoryNamesToIds ( $matchOrCats )!=='' || $matchOrCats=='')
				$filter->set("_matchor_categories_ids", $filter->categoryNamesToIds($matchOrCats));
			else
			
				$filter->set ( "_matchor_categories_ids",category::CATEGORY_ID_THAT_DOES_NOT_EXIST);
			$filter->unsetByName('_matchor_categories');
		}
		
		$matchOrRoots = array();
		if($filter->is_set('_eq_root_entry_id'))
		{
			$matchOrRoots[] = "entry " . $filter->get('_eq_root_entry_id');
			$filter->unsetByName('_eq_root_entry_id');
		}
		if($filter->is_set('_in_root_entry_id'))
		{
			$roots = explode(baseObjectFilter::IN_SEPARATOR, $filter->get('_in_root_entry_id'));
			foreach($roots as $root)
				$matchOrRoots[] = "entry $root";
				
			$filter->unsetByName('_in_root_entry_id');
		}
		if($filter->is_set('_is_root'))
		{
			if($filter->get('_is_root'))
				$filter->set('_notin_roots', 'entry');
			else
				$matchOrRoots[] = "entry";
				
			$filter->unsetByName('_is_root');
		}
		if(count($matchOrRoots))
			$filter->set('_matchand_roots', $matchOrRoots);
			
//		if ($filter->get("_matchor_duration_type") !== null)
//			$filter->set("_matchor_duration_type", $filter->durationTypesToIndexedStrings($filter->get("_matchor_duration_type")));
			
		if($filter->get(baseObjectFilter::ORDER) === "recent")
		{
			$filter->set("_lte_available_from", time());
			$filter->set("_gteornull_end_date", time()); // schedule not finished
			$filter->set(baseObjectFilter::ORDER, "-available_from");
		}
		
		if($filter->get('_free_text'))
		{
			$freeTexts = $filter->get('_free_text');
			KalturaLog::debug("Attach free text [$freeTexts]");
			
			$additionalConditions = array();
			$advancedSearch = $filter->getAdvancedSearch();
			if($advancedSearch)
			{
				$additionalConditions = $advancedSearch->getFreeTextConditions($freeTexts);
			}
			
			if(preg_match('/^"[^"]+"$/', $freeTexts))
			{
				$freeText = str_replace('"', '', $freeTexts);
				$freeText = SphinxUtils::escapeString($freeText);
				$freeText = "^$freeText$";
				$additionalConditions[] = "@(" . entryFilter::FREE_TEXT_FIELDS . ") $freeText";
			}
			else
			{
				if(strpos($freeTexts, baseObjectFilter::IN_SEPARATOR) > 0)
				{
					str_replace(baseObjectFilter::AND_SEPARATOR, baseObjectFilter::IN_SEPARATOR, $freeTexts);
				
					$freeTextsArr = explode(baseObjectFilter::IN_SEPARATOR, $freeTexts);
					foreach($freeTextsArr as $valIndex => $valValue)
					{
						if(!is_numeric($valValue) && strlen($valValue) <= 1)
							unset($freeTextsArr[$valIndex]);
						else
							$freeTextsArr[$valIndex] = SphinxUtils::escapeString($valValue);
					}
							
					foreach($freeTextsArr as $freeText)
					{
						$additionalConditions[] = "@(" . entryFilter::FREE_TEXT_FIELDS . ") $freeText";
					}
				}
				else
				{
					$freeTextsArr = explode(baseObjectFilter::AND_SEPARATOR, $freeTexts);
					foreach($freeTextsArr as $valIndex => $valValue)
					{
						if(!is_numeric($valValue) && strlen($valValue) <= 1)
							unset($freeTextsArr[$valIndex]);
						else
							$freeTextsArr[$valIndex] = SphinxUtils::escapeString($valValue);
					}
							
					$freeTextExpr = implode(baseObjectFilter::AND_SEPARATOR, $freeTextsArr);
					$additionalConditions[] = "@(" . entryFilter::FREE_TEXT_FIELDS . ") $freeTextExpr";
				}
			}
			if(count($additionalConditions))
			{	
				$matches = reset($additionalConditions);
				if(count($additionalConditions) > 1)
					$matches = '(' . implode(') | (', $additionalConditions) . ')';
					
				$this->matchClause[] = $matches;
			}
		}
		$filter->unsetByName('_free_text');
		
		return parent::applyFilterFields($filter);
	}
	
	/**
	 * Applies a single filter
	 * 
	 * @param baseObjectFilter $filter
	 */
	protected function applyPartnerScope(entryFilter $filter)
	{
		// depending on the partner_search_scope - alter the against_str 
		$partner_search_scope = $filter->getPartnerSearchScope();
		if ( baseObjectFilter::MATCH_KALTURA_NETWORK_AND_PRIVATE == $partner_search_scope )
		{
			// add nothing the the match
		}
		elseif ( $partner_search_scope == null  )
		{
			$this->add(entryPeer::DISPLAY_IN_SEARCH, mySearchUtils::DISPLAY_IN_SEARCH_KALTURA_NETWORK);
		}
		else
		{
			$this->add(entryPeer::PARTNER_ID, $partner_search_scope, Criteria::IN);
		}
	}
	
	/**
	 * Applies a single filter
	 * 
	 * @param baseObjectFilter $filter
	 */
	protected function applyFilter(baseObjectFilter $filter)
	{
		$this->applyPartnerScope($filter);
		parent::applyFilter($filter);
	}

	/* (non-PHPdoc)
	 * @see propel/util/Criteria#getNewCriterion()
	 */
	public function getNewCriterion($column, $value, $comparison = null)
	{
		return new SphinxCriterion('SphinxEntryCriteria', $this, $column, $value, $comparison);
	}

	/* (non-PHPdoc)
	 * @see propel/util/Criteria#add()
	 */
	public function add($p1, $value = null, $comparison = null)
	{
		if ($p1 instanceof Criterion)
		{
			$oc = $this->getCriterion($p1->getColumn());
			if(!is_null($oc) && $oc->getValue() == $p1->getValue() && $oc->getComparison() != $p1->getComparison())
				return $this;
				
			return parent::add($p1);
		}
		
		$nc = new SphinxCriterion('SphinxEntryCriteria', $this, $p1, $value, $comparison);
		return parent::add($nc);
	}

	/* (non-PHPdoc)
	 * @see propel/util/Criteria#addAnd()
	 */
	public function addAnd($p1, $p2 = null, $p3 = null)
	{
		if (is_null($p3)) 
			return parent::addAnd($p1, $p2, $p3);
			
		// addAnd(column, value, comparison)
		$nc = new SphinxCriterion('SphinxEntryCriteria', $this, $p1, $p2, $p3);
		$oc = $this->getCriterion($p1);
		
		if ( !is_null($oc) )
		{
			// no need to add again
			if($oc->getValue() != $p2 || $oc->getComparison() != $p3)
				$oc->addAnd($nc);
				
			return $this;
		}
			
		return $this->add($nc);
	}
	
	public function hasSphinxFieldName($fieldName)
	{
		if(strpos($fieldName, '.') === false)
		{
			$fieldName = strtoupper($fieldName);
			$fieldName = "entry.$fieldName";
		}
			
		return isset(self::$sphinxFields[$fieldName]);
	}
	
	public function getSphinxOrderFields()
	{			
		return self::$sphinxOrderFields;
	}
	
	public function getSphinxFieldName($fieldName)
	{
		if(strpos($fieldName, '.') === false)
		{
			$fieldName = strtoupper($fieldName);
			$fieldName = "entry.$fieldName";
		}
			
		if(!isset(self::$sphinxFields[$fieldName]))
			return $fieldName;
			
		return self::$sphinxFields[$fieldName];
	}
	
	public function getSphinxFieldType($fieldName)
	{
		if(!isset(self::$sphinxTypes[$fieldName]))
			return null;
			
		return self::$sphinxTypes[$fieldName];
	}
	
	public function getPositiveMatch($field)
	{
		if($field == 'roots')
			return 'prefix';
			
		return parent::getPositiveMatch($field);
	}
	
	public function hasMatchableField ( $field_name )
	{
		return in_array($field_name, array(
			"name", 
			"description", 
			"tags", 
			"admin_tags", 
			"categories_ids", 
			"flavor_params_ids", 
			"duration_type", 
			"search_text",
			"reference_id",
			"replacing_entry_id",
			"replaced_entry_id",
			"roots",
		));
	}

	public function getIdField()
	{
		return entryPeer::ID;
	}
}
