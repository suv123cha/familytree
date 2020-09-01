<?php


	/**
	 * What I imagine is each person having an array of relationships. 
	 * This array will be indexed first by the type of relationship.
	 * Each entry will then be an array of Persons.
	 */

	class FamilyTree 
	{
		protected $childOf;
		protected $parentOf;
		protected $spouseOf;

		function __construct() 
		{
			$this->parentOf = [];
			$this->childOf = [];
			$this->spouseOf = [];
		}
	}
?>