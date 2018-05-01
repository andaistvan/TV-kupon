<?php namespace Arteriaweb\Tv\Components;

use Cms\Classes\ComponentBase;
use Input;
use Mail;
use Validator;
use Redirect;


class ContactForm extends ComponentBase

{
	public function componentDetails(){
		return [
			'name' => 'Contact Form',
			'description' => 'Tv nyeremény kupon form'
		];
	}

	public function onSend(){

		$validator = Validator::make(
			[
				'name' => Input::get('name'),
				'email' => Input::get('email'),
			],
			[
				'name' => 'required',
				'email' => 'required|email'
			]
		);

		// code validator maybe??

		if ($validator->fails()){

			return ['#result' => $this->renderPartial('contactform::messages', [
				'errorMsgs' => $validator->messages()->all(),
				'fieldMsgs' => $validator->messages()
			])];

		} else {

			$vars = ['name' => Input::get('name'), 'email' => Input::get('email'), 'code' => Input::get('code')];

			Mail::send('arteriaweb.tv::mail.message', $vars, function($message) {

			$message->to('andaistvan@gmail.com', 'Admin Person');
			$message->subject('Új form üzenet érkezett');

			});
		}
	}
}