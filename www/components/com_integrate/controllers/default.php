<?php defined( '_JEXEC' ) or die( 'Restricted access' ); 
 
class IntegrateControllersDefault extends JControllerBase
{
  public function execute()
  {

    // Get the application
    $app = $this->getApplication();

    $params = JComponentHelper::getParams('com_integrate');
    if ($params->get('required_account') == 1) 
    {
        $user = JFactory::getUser();
        if ($user->get('guest'))
        {
          $app->redirect('index.php',JText::_('COM_Integrate_ACCOUNT_REQUIRED_MSG'));
        }
    }
 
    // Get the document object.
    $document     = JFactory::getDocument();
    // Default View Name is current listing.
    $viewName     = $app->input->getWord('view', 'listing');
    $viewFormat   = $document->getType();
    $layoutName   = $app->input->getWord('layout', 'listing');

    $app->input->set('view', $viewName);
 
    // Register the layout paths for the view
    $paths = new SplPriorityQueue;
    $paths->insert(JPATH_COMPONENT . '/views/' . $viewName . '/tmpl', 'normal');
 
    $viewClass  = 'IntegrateViews' . ucfirst($viewName) . ucfirst($viewFormat);
    $modelClass = 'IntegrateModels' . ucfirst($viewName);

    if (false === class_exists($modelClass))
    {
      $modelClass = 'IntegrateModelsDefault';
    }

    $view = new $viewClass(new $modelClass, $paths);

    $view->setLayout($layoutName);

    // Render our view.
    echo $view->render();
 
    return true;
  }

}