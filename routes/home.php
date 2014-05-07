<?php

class homeRoute implements RouteInterface
{

    public function getPageTemplate()
    {
        return 'home';
    }

    public function getPageParams()
    {
        $clientVersion = Application::db()->client_info;

        return array(
            'title' => 'Bands',
            'copyrightDate' => (date("Y")=="2014" ? date("Y") : "2014 - ".date("Y"))
        );
    }
}