<?php
/**
 * Fun Controller
 * 
 * A controller to test out fun and random stuff
 * 
 * @package    App\Controllers\Game
 * @author     Andrew Nite <ngendesign@email.com.com>
 * @copyright  2026 N-Gen Design <https://ngendesign.com>
 * @license    https://opensource.org MIT License
 * @link       https://github.com/n-genesis/ngen-kumbuka-ci
 */
namespace App\Controllers\Game;

use App\Controllers\UserController;
use CodeIgniter\HTTP\ResponseInterface;

class FunController extends UserController
{
    public function index()
    {
        return $this->renderView('pages/game/gameboard_v1', [
            'appTitle' => setting('App.appName') . ' | Search',
            'pageHeader' => 'Fun Controller',
            'breadcrumbLinks' => [
                ['label' => 'FunController', 'url' => site_url('gameboard')],
                ['label'=> '','url'=> site_url('')],
            ],
        ]);
    }
}
