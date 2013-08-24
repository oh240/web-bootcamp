<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
Router::connectNamed(true);

Router::connect('/', array('controller' => 'projects', 'action' => 'index', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));


/*----------------------
				Users
------------------------*/

Router::connect('/users/:action/:id', array('controller' => 'users'), array('pass' => array('id'), 'id' => '[0-9]+'));

Router::connect('/users/:action', array('controller' => 'users'));

/*----------------------
				Projects
------------------------*/


Router::connect('/projects/:id', array('controller' => 'projects','action' => 'view','id'), array('pass' => array('id'), 'id' => '[0-9]+'));

Router::connect('/projects/:id/:action', array('controller' => 'projects'), array('pass' => array('id'), 'id' => '[0-9]+'));

Router::connect('/projects/:action', array('controller' => 'projects','action'));

Router::connect('/projects/index', array('controller' => 'projects', 'action' => 'index'));

Router::connect('/projects', array('controller' => 'projects', 'action' => 'index'));

Router::connect('/projects/:id/tasklist', array('controller' => 'projects', 'action' => 'tasklist'),array('pass'=>array('id'),'id'=>'[0-9]+'));


/*----------------------
				Todos
------------------------*/

Router::connect('/todos/:action/:id', array('controller' => 'todos'), array('pass' => array('id'), 'id' => '[0-9]+'));

Router::connect('/todos/:action', array('controller' => 'todos'));

/*----------------------
				Tasks
------------------------*/
Router::connect('/tasks/:id/edit',
array('controller' => 'tasks','action'=>'edit'), array('pass' => array('id'),'id' => '[0-9]+'));
Router::connect('/tasks/:id/delete',
array('controller' => 'tasks','action'=>'delete'), array('pass' => array('id'),'id' => '[0-9]+'));
Router::connect('/tasks/:id/unchk',
array('controller' => 'tasks','action'=>'unchk'), array('pass' => array('id'),'id' => '[0-9]+'));
Router::connect('/tasks/:id/chk',
array('controller' => 'tasks','action'=>'chk'), array('pass' => array('id'),'id' => '[0-9]+'));
Router::connect('/tasks/:id',
array('controller' => 'tasks','action'=>'view'), array('pass' => array('id'),'id' => '[0-9]+'));
Router::connect('/tasks/add',
array('controller' => 'tasks','action'=>'add'));
Router::connect('/tasks',
array('controller' => 'tasks','action'=>'index'));

/*----------------------
				Comments
------------------------*/

Router::connect('/comments/:action', array('controller' => 'comments'));

Router::connect('/comments/:action/:id', array('controller' => 'comments'), array('pass' => array('id'), 'id' => '[0-9]+'));

/*----------------------
				Threads
------------------------*/
Router::connect('/projects/:project_id/threads/all/*', array('controller' => 'threads','action'=>'index'),array('pass'=>array('project_id'),'project_id'=>'[0-9]+'));

Router::connect('/projects/:project_id/threads/:id/delete', array('controller' => 'threads','action'=>'delete'),array('pass'=>array('project_id','id'),'project_id'=>'[0-9]+','id'=>'[0-9]+'));

Router::connect('/projects/:project_id/threads/:id/edit', array('controller' => 'threads','action'=>'edit'),array('pass'=>array('project_id','id'),'project_id'=>'[0-9]+','id'=>'[0-9]+'));

Router::connect('/projects/:project_id/threads/add', array('controller' => 'threads','action'=>'add'),array('pass'=>array('project_id'),'project_id'=>'[0-9]+'));

Router::connect('/projects/:project_id/threads/:id/*', array('controller' => 'threads','action'=>'view'),array('pass'=>array('project_id','id'),'project_id'=>'[0-9]+','id'=>'[0-9]+'));

Router::connect('/replies/:action/:id', array('controller' => 'replies'),array('pass'=>array('id'),'id'=>'[0-9]+'));

Router::connect('/replies/:action', array('controller' => 'replies'));



/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
//require CAKE . 'Config' . DS . 'routes.php';


