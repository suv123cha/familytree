<?php

	/**
	 * This class handles the child creation process
	 */
	class AddChildOperationProcessor
	{
		/**
		 * [processData This function process the add child addition command]
		 * @param  [string] $parent [Parent is considered as mother name]
		 * @param  [string] $child  [Child name]
		 * @param  [string] $gender [child gender]
		 * @return [string]         [description]
		 */
		public function processData($family, $parent, $child, $gender)
		{
			$response = $family->setChild($parent, $child, $gender);
			$send = ($response) ? "CHILD_ADDED_SUCCESS" : "CHILD_ADDITION_FAILED";
			return $send . "\n";
		}
	}  
?>