<?php

	class RelationshipHandler
	{
		/**
		 * [performOperation This function is used for fetching the relationship for a child]
		 * @param  [object] $familyObject [Holds the current tree instance]
		 * @param  [string] $name         [child name]
		 * @param  [string] $relationship [relationship type]
		 * @return [string]               [echos the names from the tree]
		 */
		public function performOperation($familyObject, $name, $relationship)
		{
			switch (trim($relationship)) 
			{
				case 'Paternal-Uncle':
					$response = $familyObject->getParentalUncle($name);
					return $this->organise($response);
					break;

				case 'Paternal-Aunt':
					$response = $familyObject->getParentalAunt($name);
					return $this->organise($response);
					break;

				case 'Brother-In-Law':
					$response = $familyObject->getBrotherInLaw($name);
					return $this->organise($response);
					break;

				case 'Sister-In-Law':
					$response = $familyObject->getSisterInLaw($name);
					return $this->organise($response);
					break;

				case 'Son':
					$response = $familyObject->getSons($name);
					return $this->organise($response);
					break;

				case 'Daughter':
					$response = $familyObject->getDaughters($name);
					return $this->organise($response);
					break;

				case 'Siblings':
					$response = $familyObject->getSiblings($name);
					return $this->organise($response);
					break;

				case 'Maternal-Uncle':
					$response = $familyObject->getMaternalUncle($name);
					return $this->organise($response);
					break;

				case 'Maternal-Aunt':
					$response = $familyObject->getMaternalAunt($name);
					return $this->organise($response);
					break;
			}
		}

		/**
		 * [organise Organise the response]
		 * @param  [mixed] $relData [description]
		 * @return [type]          [description]
		 */
		public static function organise($relData)
		{
			$strResponse = "";
			if($relData == 0)
			{
				$strResponse = "NONE";
			}
			elseif ($relData == -1) 
			{
				$strResponse = "PERSON NOT FOUND";
			}
			else if(empty($relData))
			{
				$strResponse = "NOT FOUND";
			}
			else
			{
				$strResponse = "";
				foreach ($relData as $value) 
				{
					$strResponse .= ucfirst($value["name"]) . " ";
				}
			}
			return $strResponse . "\n";
		}
	}  
?>