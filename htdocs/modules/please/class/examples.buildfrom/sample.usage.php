<?php

	// This script saves all attachments from all emails into a $save_to folder with original filenames

	require './class.AReader.php';

	$save_to = '/tmp';

	$mbox = new AReader($host, $user, $password);
	
	if (!$mbox->Connect()) {
		die('Unable to establish connection with mailbox');
	}
	
	while ($mbox->FetchMail()) {
		if ($mbox->HasAttachment()) {
			while($mbox->FetchAttachment()) {
				$data = $mbox->SaveAttachment($save_to);
			}
		}
		
		//$mbox->DeleteMail();
	}
	
	$mbox->Close();

?>