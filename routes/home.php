<?php

class homeRoute implements RouteInterface
{

    public function getPageTemplate()
    {
        return 'home';
    }

	public function getPageBaseTemplate()
	{
		return 'cover';
	}

    public function getPageParams()
    {

        return array(
            'title' => 'Bands',
            'copyrightDate' => (date("Y")=="2014" ? date("Y") : "2014 - ".date("Y"))
        );
    }
}
