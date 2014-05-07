<?php

class Band
{
	public static function exists($artist)
	{
		$search = \lastfm\Artist::search($artist);
		return $search;
	}
}