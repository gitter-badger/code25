<?php

class WaypointsTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('waypoints')->delete();
		Waypoints::create(
			array('lat'=>8.464222370676788,'lng'=>123.72734069824219));
		Waypoints::create(
			array('lat'=>8.49614187335958,'lng'=>123.75789642333984));
		Waypoints::create(
			array('lat'=>8.474749308123647,'lng'=>123.77540588378906));
		Waypoints::create(
			array('lat'=>8.454713921707832,'lng'=>123.77059936523438));
	}
}