<?php
	
	/**
	 * This function is used for intializer the family tree and the tree
	 * instance of the existing tree
	 */
	class FamilyTreeIntailizer extends Relationship
	{
		/**
		 * [__construct Intializes the tree on class instance creation]
		 */
		public function __construct()
		{
			parent::__construct();
			$this->init();
		}

		/**
		 * [init This function intializes the existing family tree]
		 */
		public function init()
		{
			$this->setSpouse('kingShan', 'queenanga');
			$this->setChild('queenanga', 'chit', PERSON::MALE);
			$this->setChild('queenanga','ish', PERSON::MALE);
			$this->setChild('queenanga','vich', PERSON::MALE);
			$this->setChild('queenanga', 'aras', PERSON::MALE);
			$this->setChild('queenanga', 'satya', PERSON::FEMALE);

			$this->setSpouse('vich', 'lika');
			$this->setSpouse('chit', 'amba');
			$this->setSpouse('aras', 'chitra');
			$this->setSpouse('vyan', 'satya');


			$this->setChild('amba', 'dritha', PERSON::FEMALE);
			$this->setChild('amba', 'tritha', PERSON::FEMALE);
			$this->setChild('amba', 'vritha', PERSON::MALE);

			$this->setChild('lika', 'vila', PERSON::FEMALE);
			$this->setChild('lika', 'chika', PERSON::FEMALE);

			$this->setChild('chitra', 'jnki', PERSON::FEMALE);
			$this->setChild('chitra', 'ahit', PERSON::MALE);

			$this->setChild('satya', 'asva', PERSON::MALE);
			$this->setChild('satya', 'vyas', PERSON::MALE);
			$this->setChild('satya', 'atya', PERSON::FEMALE);

			$this->setSpouse('jaya', 'dritha');
			$this->setChild('dritha', 'yodhan', PERSON::MALE);

			$this->setSpouse('arit', 'jnki');
			$this->setChild('jnki', 'laki', PERSON::MALE);
			$this->setChild('jnki', 'lavnya', PERSON::FEMALE);

			$this->setSpouse('asva', 'satvy');
			$this->setChild('satvy', 'vasa', PERSON::MALE);

			$this->setSpouse('vyas', 'krpi');
			$this->setChild('krpi', 'kriya', PERSON::MALE);
			$this->setChild('krpi', 'krithi', PERSON::FEMALE);
		}
	}
?>