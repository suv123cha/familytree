<?php

	/**
	 * This class is used for handling the 
	 */
	class OperationHandler
	{
		protected $fileData;
		protected $family;
		
		public function __construct($data)
		{
			$this->fileData[] = $data;
			$this->family = new FamilyTreeIntailizer();
		}

		/**
		 * [performOperation this function handles all the i/o operation]
		 * @return [string] [description]
		 */
		public function performOperation()
		{
			for ($lineData = 0; $lineData < count($this->fileData); $lineData++) 
			{
				for ($col = 0; $col < count($this->fileData[$lineData]); $col++) 
				{
					$arrLineData = explode(" ", $this->fileData[$lineData][$col]);
					switch ($arrLineData[0]) 
					{
						case 'ADD_CHILD':
							$addChildProcess = new AddChildOperationProcessor();
							print $addChildProcess->processData($this->family, $arrLineData[1], $arrLineData[2], $arrLineData[3]);
							break;
						
						case 'GET_RELATIONSHIP':
							$relationShip = new GetRelationshipOperationProcessor($arrLineData);
							print $relationShip->processOperation($this->family);
							break;
					}
				}
			}
		}
	}  
?>