<?php

class infoRoute implements RouteInterface
{

    public function getPageTemplate()
    {
        return 'info';
    }

    public function getPageParams()
    {
        $clientVersion = Application::db()->client_info;

        return array(
            'title' => 'info',
            'version' => $clientVersion
        );
    }
}