<?php
 
	class AReader {
		var $host;
		var $login;
		var $password;
		var $mbox;
		var $struct;
		var $emails_quan = 0; // inbox (or any other box) emails quantity
		var $current_email_index = 0; // current email index
		var $current_attach_index = 2; // current attachment index
		var $attachment = '';
		var $attachment_filename = '';
		var $processed_emails;
		var $attachment_types = array('ATTACHMENT', 'INLINE');		
		
		function AReader($host, $login, $password) {
			$this->host = $host;
			$this->login = $login;
			$this->password = $password;			
		}
		
		function Connect() {
			$this->mbox = imap_open($this->host, $this->login, $this->password);
			
			if (empty($this->mbox))	{
				return false;
			} else {
				$this->emails_quan = imap_num_msg($this->mbox);
				return true;
			}
		}
		
		function FetchMail() {
			if (empty($this->mbox) || $this->emails_quan == $this->current_email_index) {
				return false;
			}
						
			$this->current_email_index++;
			$this->current_attach_index = 2;
			
			$this->struct = imap_fetchstructure($this->mbox, $this->current_email_index, FT_UID);
			
			return true;
		}
		
		function HasAttachment() {			
			return property_exists($this->struct, 'parts');
		}
		
		function FetchAttachment() {
			$this->attachment = '';
						
			if (empty($this->struct)
				|| !property_exists($this->struct, 'parts')
				|| !array_key_exists($this->current_attach_index - 1, $this->struct->parts)
			) {
				return false;
			}						
			
			$parts_count = count($this->struct->parts) + 1;
						
			while (true) {
				if ($this->current_attach_index > $parts_count) {
					return false;
				}
				
				$part = $this->struct->parts[$this->current_attach_index - 1];
				
				if (!property_exists($part, 'disposition') || !in_array($part->disposition, $this->attachment_types)) {
					$this->current_attach_index++;
					continue;
				}
				
				if (!empty($part->parameters)) {
					$parameters = $part->parameters;
					$fattr = 'NAME';
				} else {
					$parameters = $part->dparameters;
					$fattr = 'FILENAME';
				}
				
				foreach ($parameters as $parameter) {
					if ($parameter->attribute == $fattr) {
						$filename = $parameter->value;
					}
				}
				
				if (empty($filename)) {
					$this->current_attach_index++;
					continue;
				}
				
				$decoded = imap_mime_header_decode($filename);
				$filename = '';
				foreach ($decoded as $dec) {					
					if (!empty($dec->text)) {
						$encoding = $dec->charset;
						$fpart = $dec->text;
						$filename .= $fpart;
					}
				}
				
				$this->attachment_filename = $filename;				
								
				$this->attachment = imap_fetchbody($this->mbox, $this->current_email_index, $this->current_attach_index);				
				$this->attachment = base64_decode($this->attachment);
				
				$this->current_attach_index++;
				
				if (empty($this->attachment)) {					
					return false;
				}
				
				return true;
			}
			
		}
		
		function SaveAttachment($save_path, $new_filename = '') {
			if (!empty($this->attachment)) {
				$save_to = $save_path.'/'.(!empty($new_filename) ? $new_filename : $this->attachment_filename);
				$bytes_quan = file_put_contents($save_to, $this->attachment);
				if (!empty($bytes_quan)) {
					return $save_to;
				}
			}
			
			return '';
		}
		
		function GetAttachmentFilename() {
			return $this->attachment_filename;
		}
		
		function DeleteMail() {
			if ($this->current_email_index > 0) {
				imap_delete($this->mbox, $this->current_email_index);
			}
		}
		
		function Close() {
			if ($this->mbox) {
				imap_close($this->mbox, CL_EXPUNGE);
			}
		}		
	}
 
?>