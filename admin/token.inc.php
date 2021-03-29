<?php
//トークンを発行
function getToken()
{
	return sha1(uniqid(mt_rand(),true));
}
