<?php
	
	/**
	 * This class is used for handling the relationship 
	 * responses
	 */
	class GetRelationshipOperationProcessor
	{
		protected $name;
		protected $relationShip;

		public function __construct($data)
		{
			$this->name = $data[1];
			$this->relationShip = $data[2];
		}

		public function processOperation($familyInstance)
		{
			$relationshipHandler = new RelationshipHandler();
			return $relationshipHandler->performOperation($familyInstance, $this->name, $this->relationShip);
		}
	}  
?>