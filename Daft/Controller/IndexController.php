<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */

namespace Daft\Controller;

use Daft\Search\Search;

/**
 * Class IndexController
 * @package Daft\Controller
 */
class IndexController
{

    /**
     * IndexController constructor.
     */
    public function __construct()
    {
    }

    /**
     * Getting post data then sending request to Search Api and echoing data on view
     */
    public function indexAction()
    {

        $data = array();

        if (isset($_POST['text'])) {
            $text = $_POST['text'];
            $search = new Search();

            $data = $search->Request($text);
        }

        echo $this->view('Public/index.php', $data);
    }

    /**
     * view method for display page
     * @param $file
     * @param array $variables
     * @return string
     */
    protected function view($file, $variables = array())
    {
        extract($variables);
        ob_start();
        include $file;
        $renderedView = ob_get_clean();

        return $renderedView;
    }
}