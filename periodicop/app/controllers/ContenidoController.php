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
      $c->categoria_id =  $this->request->getPost('categoria');
      $c->modified  =  date("Y-m-d H:i:s");

      //Subir archivos para nuevo y actualizar
      if($this->request->hasFiles())
      {
        foreach ($this->request->getUploadedFiles() as $file)
          {
          $file->moveTo('img/' . $file->getName());
          $c->image_url = $file->getName();
          }
      }


      if($opcion == "editar")
      {
        $c->update();
      }else
      {
        $c->created   =  date("Y-m-d H:i:s");
        $c->save();
      }

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
