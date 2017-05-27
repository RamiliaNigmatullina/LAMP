<?php
  class Core {
    public function process_request() {

      $requestUriInfo = parse_url($_SERVER["REQUEST_URI"]);
      $requestPaths = explode("/", $requestUriInfo["path"]);

      if (empty($requestPaths[1])) {
        $controllerName =  MVC_DEFAULT_CONTROLLER;
      } else {
        $controllerName =  $requestPaths[1];
      }

      if (empty($requestPaths[2])) {
        $actionName = MVC_DEFAULT_ACTION;
      } else {
        $actionName = $requestPaths[2];
      }

      if (count($requestPaths) >= 3) {
        $pathParams = array_slice($requestPaths, 3);
      } else {
        $pathParams = [];
      }

      $controllerPath = SITE_PATH . "/controllers/" . $controllerName . ".controller.php";
      $controllerMethodName =  $actionName;

      if (!file_exists($controllerPath)) {
        exit('No such controller "' . $controllerName . '".');
      }

      require_once $controllerPath;
      if (!method_exists($controllerName."Controller", $actionName)) {
        exit('No such action "' . $controllerMethodName . '".');
      }

      $controller = $controllerName."Controller";
      $controllerClass = new $controller();

      $responseData = call_user_func_array(array($controllerClass, $controllerMethodName), $pathParams);

      if (!isset($responseData["view"]) || !isset($responseData["data"]) ){
        if(!isset($responseData["redirect"])){
          exit('Action "' . $actionName . '" doesn\'t return proper response!.');
        }
        else{
          header('Location:'.$responseData['redirect']);
          exit();
        }
      }

      $core = new Core();
      $core->load_view($responseData['view'], $responseData['data']);
    }

    public function error403() {
      return [ "view" => "error_403", "data" => []];;
    }

    public function error404($entity = "page") {
      return [ "view" => "error_404", "data" => ["entity" => $entity]];
    }

    public function load_view($view_name, $data) {
      $common = new Common();

      if (file_exists(SITE_PATH . '/views/' . $view_name . '.inc.php')) {
        $user = $common->get_authorized_user();

        require SITE_PATH . '/views/_blocks/header.inc.php';
        require SITE_PATH . '/views/' . $view_name . '.inc.php';
        require SITE_PATH . '/views/_blocks/footer.inc.php';
      } else {
        exit("No such template: " . $view_name . ".inc.php");
      }
    }
  }
