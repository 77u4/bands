<?php

class Router
{
    private static $response;
    private static $currentTemplate;
    private static $routeElements;

    public static function parse($route)
    {
        $routeElements = explode('/', $route);

        self::$routeElements = $routeElements;

        switch ($routeElements[0]) {
            case '/':
            case '':
                $routeElements[0] = 'home';
                break;
        }

        Router::execute($routeElements);
    }

    public static function execute($routeElements)
    {
        $baseRoute = $routeElements[0];

        $baseDir = dirname(__FILE__);
        $routeFilePath = $baseDir . '/../routes/' . $baseRoute . '.php';
        if (file_exists($routeFilePath)) {
            require_once($routeFilePath);
            $className = $baseRoute . 'Route';
            $template = $className::getPageTemplate();
            $params = $className::getPageParams();
            $baseTemplate = $className::getPageBaseTemplate();
        } else {
            $notfound = self::handleNotFound();
            $template = $notfound['template'];
            $params = $notfound['params'];
            $baseTemplate = 'cover';
        }

        self::$response = self::renderTemplate($template, $params, $baseTemplate);
    }

    private static function handleNotFound()
    {
        $routeElements = self::getRoute();
        $username = $routeElements[0];
		
        $result = array(
            'template' => '404',
            'params' => array('title' => '404', 'url' => htmlentities(implode('/', $routeElements)), 'copyrightDate' => (date("Y")=="2014" ? date("Y") : "2014 - ".date("Y")))
        );

        if (User::exists($username)) {
            $result['template'] = 'user';
            $result['params'] = array(
                'username' => $username,
                'title' => '@'.$username.'\'s Profile'
            );
        }else{
            header('HTTP/1.1 404 Not Found');
        }

        return $result;
    }

    public static function getRoute()
    {
        return self::$routeElements;
    }

    public static function getResponse()
    {
        if (!isset(self::$response)) {
            throw new Exception('route response has not yet been set', 6);
        }
        return self::$response;
    }

    public static function setTemplate($name)
    {
        $baseDir = dirname(__FILE__);
        $templatedir = $baseDir . '/../templates/' . $name;
        if (\is_dir($templatedir) && \file_exists($templatedir . '/index.tpl')) {
            self::$currentTemplate = $name;
        } else {
            throw new Exception('selected template does not exist', 4);
        }
    }

    public static function getTemplateName()
    {
        return self::$currentTemplate;
    }

    public static function getTemplateDir()
    {
        $baseDir = dirname(__FILE__) . '/../templates/';
        $templateName = self::getTemplateName();
        return $baseDir . $templateName;
    }

    private static function renderTemplate($pageTemplateName, $params = array(), $baseTemplateName = 'index')
    {
        $baseTemplate = self::getTemplateFileContent($baseTemplateName);

        $pageTemplate = self::getTemplateFileContent($pageTemplateName);

        //parsing page template into base template;
        $templateOutput = self::replaceTemplatePlaceHolder($baseTemplate, 'pageContent', $pageTemplate);

        if (is_array($params)) {
            foreach ($params as $key => $value) {
                $templateOutput = self::replaceTemplatePlaceHolder($templateOutput, $key, $value);
            }
        } else {
            throw new Exception('Invalid Template parameters provided.', 5);
        }

        return $templateOutput;
    }

    private static function getTemplateFileContent($filename)
    {
        $templatedir = self::getTemplateDir();
        $templateFileName = $templatedir . '/' . $filename . '.tpl';
		
        if (\file_exists($templateFileName)) {
            $content = \file_get_contents($templateFileName);
        } else {
            throw new Exception('selected template does not exist', 4);
        }
        return $content;
    }

    private static function replaceTemplatePlaceHolder($content, $source = false, $target = '')
    {
        if ($source === false || empty($source)) {
            $source = '[A-Z0-9_\-]+';
        } else {
            $source = \preg_quote($source);
        }
        $result = \preg_replace('#\{\{ ' . $source . ' \}\}#i', $target, $content);
        return $result;
    }
}