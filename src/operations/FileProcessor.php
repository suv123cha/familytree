<?php
	
	/**
	 * This class is used for capturing the Input data
	 */
	class FileProcessor
	{
		/**
		 * [processInputFile This function is used for processing the input file]
		 * @return [arr] [description]
		 */
		public function processInputFile($filePath)
		{
			$fileName =  $filePath;
			$handle = fopen($fileName, "r");
			if ($handle) 
			{
				while (($line = fgets($handle)) !== false) 
				{
					$arrData[] = $line;
				}
				return $arrData;
			}
			else
			{
				return [];
			}
		}
	}
?>