<?php

	/**
	 * This is the main node class for the person
	 */
	class Person extends FamilyTree
	{
		CONST MALE = "male";
		CONST FEMALE = "female";
		
		function __construct()
		{
			parent::__construct();
		}

		/**
		 * [setSpouse This function is used for adding spouse]
		 * @param [string] $husband [description]
		 * @param [string] $wife    [description]
		 * @return [boolean]
		 */
		function setSpouse($husband, $wife) 
		{
			$husband = trim(strtolower($husband));
			$wife = trim(strtolower($wife));
			$this->spouseOf[$wife] = ['name' => $husband, 'gender' => self::MALE];
			$this->spouseOf[$husband] = ['name' => $wife, 'gender' => self::FEMALE];
			return 1;
		}



		/**
		 * [addChild This function is used for adding child]
		 * 
		 * @param [string] $parent [Parent considered as mother]
		 * @param [string] $child  [child name]
		 * @param [string] $gender [child gender]
		 *
		 * @return [boolean]
		 */
		function setChild($parent, $child, $gender) 
		{
			$parent = trim(strtolower($parent));
			$spouse = $this->getSpouse($parent);
			if($spouse["gender"] == PERSON::FEMALE)
			{
				return 0;
			}

			if(!isset($this->spouseOf[$parent]))
			{
				return -1;
			}

			$child = trim(strtolower($child));
			$gender = trim(strtolower($gender));

			if (!isset($this->childOf[$parent])) 
			{
				$this->childOf[$parent] = [];
			}

			$this->childOf[$parent][] = ['name' => $child, 'gender' => $gender];
			$this->parentOf[$child] = ['mother' => $parent, 'father' => $this->spouseOf[$parent]];
			return 1;	
		}


		/**
		 * [getChildren This function is used for fetching the childerns]
		 * @param  [string] $parent [description]
		 * @return [arr]         [description]
		 */
		function getChildren($parent) 
		{
			$parent = trim(strtolower($parent));
			return $this->childOf[$parent] ?? [];
		}

		/**
		 * [getParents This function is used for finding the parents of a child]
		 * @param  [string] $child [description]
		 * @return [arr]        [description]
		 */
		function getParents($child) 
		{
			$child = trim(strtolower($child));
			return $this->parentOf[$child] ?? null;
		}

		/**
		 * [getSpouse This function is used for finding the spouse of a child]
		 * @param  [string] $name [description]
		 * @return [string]       [description]
		 */
		function getSpouse($name)
		{
			$name = trim(strtolower($name));
			return $this->spouseOf[$name] ?? null;
		}
	}  
?>