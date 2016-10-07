<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class Beer{
	public $id;
	public $name;
	public $style;
	public $img;

	public function getInputFilter(){
		$inputFilter = new InputFilter();

		$inputFilter->add(array(
			'name'     => 'id',
			'required' => false,
			'filters'  => array(
				array('name' => 'Int'),
			),
		));
		$inputFilter->add(array(
			'name'     => 'name',
			'required' => true,
			'filters'  => array(
				array('name' => 'StripTags'),
				array('name' => 'StringTrim'),
			),
			'validators' =>array(
				array(
					'name'    => 'StringLength',
					'options'    => array(
						'encoding' => 'UTF-8',
						'min'      => 1,
						'max'      =>100,
					),
				),
			),

		));
		$inputFilter->(array(
			'name'     => 'style',
			'required' => false,
			'filters'  => array(
				array('name' => 'StripTags'),
				array('name' => 'StringTrim'),
			),
		));
		return $inputFilter;
	}

}