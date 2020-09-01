<?php

	class Relationship extends Person
	{
		function __construct()
		{
			parent::__construct();
		}

		/**
		 * [getSiblings This function fetches all the siblings of the child]
		 * @param  [string] $name [Holds the name of the child]
		 * @return [arr]       [description]
		 */
		function getSiblings($name)
		{
			$name = trim(strtolower($name));
			$par = $this->getParents($name);
			if (empty($par)) 
			{
				return [];
			}
			
			$all_children = $this->getChildren($par['mother']);
			foreach ($all_children as $key => $value) 
			{
				if($value["name"] == $name)
				{
					unset($all_children[$key]);
				}
			}
			return $all_children;
		}

		/**
		 * [getSons This function is used for getting the sons]
		 * Also checks for parent parents in the tree for validations
		 * 
		 * @param  [type] $name [name is consider as mother]
		 * @return [arr]         [description]
		 */
		function getSons($name)
		{
			//check parent parents
			$name = trim(strtolower($name));
			$par = $this->getParents($name);
			if(empty($par))
			{
				return -1;
			}

			$all_children = $this->getChildren($name);
			if(empty($all_children))
			{
				return 0;
			}
			foreach ($all_children as $key => $value) 
			{
				if($value["gender"] == PERSON::FEMALE)
				{
					unset($all_children[$key]);
				}
			}
			return $all_children;
		}

		/**
		 * [getDaughters This function is used for getting the daughters]
		 * Also checks for parent parents in the tree for validations
		 * 
		 * @param  [string] $name [Parent is consider as mother]
		 * @return [arr]         [description]
		 */
		function getDaughters($name)
		{
			//check parent parents
			$name = trim(strtolower($name));
			$par = $this->getParents($name);
			if(empty($par))
			{
				return -1;
			}

			$all_children = $this->getChildren($parent);
			if(empty($all_children))
			{
				return 0;
			}

			foreach ($all_children as $key => $value) 
			{
				if($value["gender"] == PERSON::MALE)
				{
					unset($all_children[$key]);
				}
			}
			return $all_children;
		}


		/**
		 * [getSisterInLaw This function fetches all the sister/bother in law of child]
		 * @param  [string] $name [Holds the name of the child]
		 * @return [arr]       [description]
		 */
		function getSisterInLaw($name)
		{
			$name = trim(strtolower($name));
			$all_siblings =  $this->getSiblings($name);
			$spouse = [];
			if(empty($all_siblings))
			{
				//check for spouse for finding siblings
				$spouse = $this->getSiblings($this->getSpouse($name)["name"]);
				goto check;
			}

			foreach ($all_siblings as $sibs) 
			{
				array_push($spouse, $this->getSpouse($sibs["name"]));
			}

			check:
			return array_filter($spouse, function ($child) 
			{
				return $child['gender'] == PERSON::FEMALE;
			});
		}

		/**
		 * [getBrotherInLaw This function fetches all the sister/bother in law of child]
		 * @param  [string] $name [Holds the name of the child]
		 * @return [arr]       [description]
		 */
		function getBrotherInLaw($name)
		{
			$name = trim(strtolower($name));
			$all_siblings =  $this->getSiblings($name);
			$spouse = [];
			if(empty($all_siblings))
			{
				//check for spouse for finding siblings
				$spouse = $this->getSiblings($this->getSpouse($name)["name"]);
				goto check;
			}

			foreach ($all_siblings as $sibs) 
			{
				array_push($spouse, $this->getSpouse($sibs["name"]));
			}

			check:
			return array_filter($spouse, function ($child) 
			{
				return $child['gender'] == PERSON::MALE;
			});
		}

		/**
		 * [getParentalUncle description]
		 * @param  [string] $name [description]
		 * @return [arr]       [description]
		 */
		function getParentalUncle($name)
		{
			$name = trim(strtolower($name));
			$parents = $this->getParents($name);
			$all_siblings =  $this->getSiblings($parents["father"]["name"]);
			return array_filter($all_siblings, function ($child) 
			{
				return $child['gender'] == PERSON::MALE;
			});
		}


		/**
		 * [getParentalAunt This function is used for fetching the parental aunt]
		 * @param  [string] $name [Child name]
		 * @return [arr]       [description]
		 */
		function getParentalAunt($name)
		{
			$name = trim(strtolower($name));
			$parents = $this->getParents($name);
			$all_siblings =  $this->getSiblings($parents["father"]["name"]);
			$spouse = [];
			foreach ($all_siblings as $sibs) 
			{
				array_push($spouse, $this->getSpouse($sibs["name"]));
			}

			return array_filter($spouse, function ($child) 
			{
				return $child['gender'] == PERSON::FEMALE;
			});
		}

		/**
		 * [getMateralUncle This function is used for fetching the maternal uncle of a child]
		 * @param  [string] $name [Child name]
		 * @return [arr]       [description]
		 */
		function getMaternalUncle($name)
		{
			$name = trim(strtolower($name));
			$parents = $this->getParents($name);
			$all_siblings =  $this->getSiblings($parents["mother"]);
			return array_filter($all_siblings, function ($child) 
			{
				return $child['gender'] == PERSON::MALE;
			});
		}

		/**
		 * [getMaternalAunt This function is used for displaying the parental aunts]
		 * @param  [string] $name [Child name]
		 * @return [arr]       [description]
		 */
		function getMaternalAunt($name)
		{
			$name = trim(strtolower($name));
			$parents = $this->getParents($name);
			$all_siblings =  $this->getSiblings($parents["mother"]);
			$spouse = [];
			foreach ($all_siblings as $sibs) 
			{
				array_push($spouse, $this->getSpouse($sibs["name"]));
			}

			return array_filter($spouse, function ($child) 
			{
				return $child['gender'] == PERSON::FEMALE;
			});
		}
	}  
?>