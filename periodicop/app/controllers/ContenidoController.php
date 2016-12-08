<?php
use Phalcon\Mvc\Dispatcher;
use Phalcon\Http\Response;


class ContenidoController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {



    }

   	public function newAction()
   	{
   		//$arreglo = array("rr"=> 9, 1 => "value");
   		//$this->view->variable = $arreglo;
   	}

   	public function saveAction()
   	{

      $opcion = $this->request->getPost('opcion');


      if($opcion == "editar")
        $c = Contenidos::findFirst($this->request->getPost('id'));
      else
          $c = new Contenidos();

      $c->titulo    = $this->request->getPost('titulo');
      $c->cuerpo    = $this->request->getPost('cuerpo');
      $c->image_url = "imagen.png";
      $c->categoria_id =  $this->request->getPost('categoria');
      //$c->created   =  date("Y-m-d H:i:s");
      $c->modified  =  date("Y-m-d H:i:s");

      if($opcion == "editar")
      {
        $c->update();
      }else
      {
        $c->created   =  date("Y-m-d H:i:s");
        $c->save();
      }





	  /*$this->dispatcher->forward(
	  		[
            "controller"	=> "contenido",
            "action"		=> "index"
       		]
	  	);*/



      //echo "Opcion: ".$this->request->getPost('opcion');
		$this->response->redirect("contenido/index");
   	}


   	public function deleteAction()
   	{
   		$id = $this->request->get('id');
   		$contenido = Contenidos::findFirst($id);
   		$contenido->delete();
   		$this->response->redirect("contenido/index");
   	}


   	public function updateAction()
   	{

   		$id = $this->request->get('id');
   		$this->view->id = $id;

   	}

}
