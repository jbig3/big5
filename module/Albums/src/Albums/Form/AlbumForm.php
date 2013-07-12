<?php
namespace Albums\Form;

use Zend\Form\Form;

class AlbumForm extends Form
{
	public function __construct($name = null)
	{
		// we want to ignore the name passed
		parent::__construct('album');
		$this->setAttribute('method', 'post');
		$this->add(array(
				'name' => 'id',
				'attributes' => array(
						'type'  => 'hidden',
				),
		));
		$this->add(array(
				'name' => 'artist',
				'attributes' => array(
						'type'  => 'text',
				),
				'options' => array(
						'label' => 'Künstler',
				),
		));
		$this->add(array(
				'name' => 'title',
				'attributes' => array(
						'type'  => 'text',
				),
				'options' => array(
						'label' => 'Titel',
				),
		));
		$this->add(array(
				'name' => 'submit',
				'attributes' => array(
						'type'  => 'submit',
						'value' => 'Speichern',
						'id' => 'submitbutton',
				),
		));
	}
}