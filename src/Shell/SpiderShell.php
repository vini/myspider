<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\ORM\TableRegistry;

class SpiderShell extends Shell
{
    public function main() {		
		$urlsTable= TableRegistry::get('Urls');
		$urls = $urlsTable->find()->where(['visited' => 'no'])->all()->toArray();		
		
		foreach($urls as $url) {		
			$this->getUrl($url['url']);
		}		
    }
	
	private function getUrl($url) {
		$this->getItems($url);
	}
	
	private function getItems($url) {
		if(substr($url, 0, 1) == '//') $url = str_replace('//', 'http://', $url); //VERIFICAR
	
		$urlsTable= TableRegistry::get('Urls');
		$emailsTable= TableRegistry::get('Emails');
				
		$conteudo = file_get_contents($url);
						
		/* Salva E-mails */
		$emails = $this->getEmails($conteudo);

		if(!empty($emails)) { //Se tem Emails na Url Atual:	
			foreach($emails as $email) {
				//Verifica se já existe
				$item_existe = $emailsTable->find()->where(['email' => $email])->first();
				if($item_existe) continue; //Pula para o próximo

				//Salva no BD
				$item = $emailsTable->newEntity();
				$item->email = $email;
				$emailsTable->save($item);
			}
		}
		/* */
		
		/* Marca URL como Visitada */
		$atual_url = $urlsTable->find()->where(['url' => $url])->first(); // Return article with id 12
		$atual_url->visited = 'yes';
		$urlsTable->save($atual_url);		
		/* */		
		
		/* Pega Urls Novas apartir da Url atual */
		$links = $this->getUrls($conteudo);						
		foreach($links as $key => $value) {
			if (filter_var($value, FILTER_VALIDATE_URL) == false) continue; //Se Url é inválida: pula para a próxima
		
			//Verifica se já existe
			$item_existe = $urlsTable->find()->where(['url' => $value])->first();
			if($item_existe || $value == $url) continue; //se existe: pula para a próxima
		
			//Salva no BD
			$item = $urlsTable->newEntity();
			$item->url = $value;
			$urlsTable->save($item);
			
			$this->getUrl($value);
		}
		/* */
											
	}	
		
	private function getUrls($param) {
		preg_match_all('/<a href=["\']?((?:.(?!["\']?\s+(?:\S+)=|[>"\']))+.)["\']?>/i', $param, $results);
		return $results[1];
	}
	
	private function getEmails($param) {
		preg_match_all('/\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i', $param, $results);
		return array_unique($results[0]);
	}
	
}
?>