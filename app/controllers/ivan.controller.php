<?php

class controllerIvan extends controller
{
	protected $layoutFile = 'ivanPassLayout';
	
	public function actionGetPass()
	{
		
		if (core::app()->input->form ) {
			
			try {
				$passData = $this->getModel('ivanPass')->generatePass(core::app()->input->post);
				header("refresh: 0; url=?controller=ivan&action=getpass&number=".$passData); 	
			}
			catch (nameException $e) {
				$data = ['errorName'=> $e->getMessage()];
			}
			catch (secondNameException $e) {
				$data = ['errorSecondName'=> $e->getMessage()];
				
			}
			catch (phoneException $e) {
				$data = ['errorPhone'=> $e->getMessage()];
				
			}
			catch (passportException $e) {
				$data = ['errorPassport'=> $e->getMessage()];
				
			}
			catch (emailException $e) {
				$data = ['errorEmail'=> $e->getMessage()];
				
			}
			catch (numberAutoException $e) {
				$data = ['errorNumberAuto'=> $e->getMessage()];
				
			}
			catch (socialException $e) {
				$data = ['errorSocial'=> $e->getMessage()];
				
			}
			catch (jobException $e) {
				$data = ['errorJob'=> $e->getMessage()];
				
			}
			catch (transportException $e) {
				$data = ['errorTransport'=> $e->getMessage()];
				
			}
			catch (Exception $e) {
				$data = ['error'=> $e->getMessage()];
				
			}
			if(!empty($data)){
				$data['post'] = core::app()->input->post;
				echo $this->renderLayout([
					'content' => $this->renderTemplate('generatePassForm',$data),
				]); 
							
			}

			return;
		} 
		


		// тут форма для получения пропуска
		if(isset(core::app()->input->get['number'])){
			echo $this->renderLayout([
				'content' => $this->renderTemplate('showPass',['passData' => core::app()->input->get['number']])
			]); 
		}else{
			echo $this->renderLayout([
				'content' => $this->renderTemplate('generatePassForm')
			]); 
		}

	}

	public function actionCheckPass()
	{
		$error = "";
		$checkData = [];
		if (core::app()->input->form) {
			 try {
				$checkData = $this->getModel('ivanPass')->check(core::app()->input->post['pass_code']);
			 } 
			 catch (Exception $e)
			{
				$error =$e->getMessage();
			}
			
			// тут инфоррмация по проверяемому пропуску
			echo $this->renderLayout([
				'content' => $this->renderTemplate('checkResult', ['checkData' => $checkData, 'error' => $error])
			]);
			return;
		} 
		// тут форма проверки пропусков
		echo $this->renderLayout([
			'content' => $this->renderTemplate('checkForm')
		]);
	}
}

