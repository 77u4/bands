<?php

class Router
{
    private static $response;
    private static $currentTemplate;

    public static function parse($route)
    {
        switch ($route) {
            case '/':
            case 'home':
                $template = 'home';
                $params = array('title' => 'home', 'copyrightDate' => (date("Y")=="2014" ? date("Y") : "2014 - ".date("Y")));
                break;
            case 'info':
                $template = 'info';
                $params = array('title' => 'info', 'version' => Application::db()->client_info);
                break;
            default:
            	$template = 'showUser';
            	$params = array('title' => 'Profil von ', 'user' => 'HorstDingDong3000');
        }
        self::$response = self::renderTemplate($template, $params);
    }

    public static function getResponse()
    {
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