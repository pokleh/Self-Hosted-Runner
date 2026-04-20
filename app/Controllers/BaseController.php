<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 *
 * Extend this class in any new controllers:
 * ```
 *     class Home extends BaseController
 * ```
 *
 * For security, be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */

    protected ?array $currentUser = null;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Load here all helpers you want to be available in your controllers that extend BaseController.
        // Caution: Do not put the this below the parent::initController() call below.
        // $this->helpers = ['form', 'url'];

        // Caution: Do not edit this line.
        parent::initController($request, $response, $logger);

        helper(['url', 'form']);

        if (session()->get('user_id')) {
            $this->currentUser = [
                'id' => (int) session()->get('user_id'),
                'name' => (string) session()->get('user_name'),
                'email' => (string) session()->get('user_email'),
                'role' => (string) session()->get('user_role'),
            ];

            $overdueCount = (new TaskModel())
                ->where('status !=', 'done')
                ->where('due_date <', date('Y-m-d'))
                ->countAllResults();

            view()->setVar('currentUser', $this->currentUser);
            view()->setVar('overdueCount', $overdueCount);
        }
    }
}
