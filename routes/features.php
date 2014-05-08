<?php

class featuresRoute implements RouteInterface
{

    public function getPageTemplate()
    {
        return 'features';
    }

	public function getPageBaseTemplate()
	{
		return 'cover';
	}

    public function getPageParams()
    {
        $clientVersion = Application::db()->client_info;

        return array(
            'title' => 'Features - Bands',
            'copyrightDate' => (date("Y")=="2014" ? date("Y") : "2014 - ".date("Y"))
        );
    }
}