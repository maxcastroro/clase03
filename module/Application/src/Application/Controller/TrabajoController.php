<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TrabajoController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    public function otroAction()
    {
        return new ViewModel();
    }
    public function recibeparametrosAction()
    {
        $saludo="Mensaje para correr desnudo por la casa!!!";
        $array=array("Pedro","Marcelo","Pablo","Romina");
        return new viewModel(array('saludo'=>$saludo,'detalle'=>'cualquier cosa','nombres'=>$array));
    }
    public function valoresurlAction()
    {
        $id =  $this->params()->fromRoute("id", null);
        $id2= $this->params()->fromRoute("id2",null);
        $titulo="Valores get por la URL";
        $url=$this->getRequest()->getBaseUrl();
        return new viewModel(array('titulo'=>$titulo,'id'=>$id,'id2'=>$id2,'url'=>$url));
    }
   //pluging redirect    Nota: se pierden los estados por lo que no es recomendable
    public function redireccionarAction()
    {
        return $this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/application/index/hola');
    }
    //plugins forward
    public function cargaotravistaAction()
    {
        return $this->forward()->dispatch('Application\Controller\Trabajo', array('action' => 'otro'));
    }
    public function conrenderAction()
    {   
        // Renders application/trabajo/conrender.phtml
        $view=new ViewModel();
        return $view;
    }
    
}
