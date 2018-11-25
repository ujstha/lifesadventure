<?php
	function makeconnection()
	{
		$cn=mysqli_connect("localhost","root","","lifesadventure-modified");
		if(mysqli_connect_errno())
		{
			echo "failed to connect to mysqli:".mysqli_connect_error();
		}
		return $cn;
	}

	$cn=mysqli_connect("localhost","root","","lifesadventure-modified");

?>