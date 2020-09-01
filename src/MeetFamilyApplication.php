<?php

	include 'autoload.php';
	class MeetFamilyApplication
	{
		public function processData($filePath)
		{
			$fileProcessor = new FileProcessor();
			$fileData = $fileProcessor->processInputFile($filePath);
			if(empty($fileData))
			{
				print "Empty File";
			}
			$operationHandler = new OperationHandler($fileData);
			$operationHandler->performOperation();
		}
	}

?>