<?php
namespace ctrlbox;

class ContentCheckerRegex extends ContentChecker{
	
	public function setup(){
		$filters = 					array();
		$filters['emails'] =  		array('re' => '/([\w+\.]*\w+@[\w+\.]*\w+[\w+\-\w+]*\.\w+)/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'Email Addresses');
		$filters['unpw'] = 			array('re' => '/[A-Z0-9._%+-]+@[A-Z0-9.-]*?\.?[A-Z]{2,4}\s*?[;|:|\||\s|,]+?\s*?\w{5,}/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'Usernames Password Combinations');
		//md5
		$filters['md532'] = 		array('re' => '/[0-9A-Fa-f]{32}/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'MD5');
		$filters['md5wp'] =  		array('re' => '/\$P\$[a-zA-Z0-9\/\.]{31}/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'Wordpress MD5');
		$filters['md5bb3'] =  		array('re' => '/\$H\$[a-zA-Z0-9\/\.]{31}/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'bulletin board 3 MD5');
		$filters['md5chp'] =  		array('re' => '/^[a-fA-F0-9]{32}:[0-9]{32}:[a-fA-F0-9]{2}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'MD5');					
		$filters['md5ipboard'] =  	array('re' => '/[a-fA-F0-9]{32}:.{5}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'Ip Board MD5');					
		$filters['md5palshop'] =  	array('re' => '/^[a-fA-F0-9]{51}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'palshop MD5');					
		$filters['md5oscommerce'] = array('re' => '/^[a-fA-F0-9]{32}:[a-zA-Z0-9]{2}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'oscommerce MD5');					
		$filters['md5cpix'] =  		array('re' => '/^[a-zA-Z0-9\/\.]{16}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'cpix MD5');					
		$filters['md5mybb'] =  		array('re' => '/^[a-fA-F0-9]{32}:[a-z0-9]{8}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'MyBB MD5');					
		$filters['md5zipmon'] =  	array('re' => '/^[a-fA-F0-9]{32}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'Zip Monitor MD5');					
		$filters['md5bsb'] =  		array('re' => '/^\$1\$[a-zA-Z0-9./]{8}\$[a-zA-Z0-9./]{1,}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'BSD MD5');				
		$filters['md5apachec']=  	array('re' => '/^\$apr1\$[a-zA-Z0-9./]{8}\$[a-zA-Z0-9./]{1,}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'apachec');					
		$filters['md5joomla'] =  	array('re' => ':/^\$P\$[a-zA-Z0-9\/\.]{31}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'Joomla MD5');					
		$filters['md5apr'] =		array('re' => '/^\$apr1\$.{0,8}\$[a-zA-Z0-9\/\.]{22}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'APR MD5');					
		$filters['md5u'] =  		array('re' => '/^\$1\$.{0,8}\$[a-zA-Z0-9\/\.]{22}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'MD5 u');					
		$filters['md5sbt'] =  		array('re' => '/^[a-fA-F0-9./]{16}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'MD5 sbt');
		// ssha
		$filters['ssha512b64'] =  	array('re' => '/^\{SSHA512\}[a-zA-Z0-9+]{96}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'ssha512');
		$filters['ssha1b64'] =  	array('re' => '/^\{SSHA\}[a-zA-Z0-9]{32,38}?(==)?$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'ssha64');
		$filters['ssha1'] =  		array('re' => '/^({SSHA})?[a-zA-Z0-9\+\/]{32,38}?(==)?$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'ssha1');
		//sha*
		$filters['sha1ldap'] =  	array('re' => '/^\{SSHA\}[a-zA-Z0-9+/]{28,}[=]{0,3}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'LDAP SHA1');
		$filters['sha1ldaps'] =  	array('re' => '/^\{SHA\}[a-zA-Z0-9+/]{27}=$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'LDAPS SHA1');
		$filters['sha512'] = 		array('re' => '/^[a-fA-F0-9]{128}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'SHA 512');
		$filters['sha384'] =  		array('re' => '/^[a-fA-F0-9]{96}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'SHA 384');
		$filters['sha512u'] =  		array('re' => '/^\$6\$.{0,22}\$[a-zA-Z0-9\/\.]{86}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'SHA 512u');
		$filters['sha256u'] =  		array('re' => '/^\$5\$.{0,22}\$[a-zA-Z0-9\/\.]{43,69}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'SHA 256u');
		$filters['sha384d'] =  		array('re' => '/^sha384\$.{0,32}\$[a-fA-F0-9]{96}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'SHA 384d');
		$filters['sha256d'] =  		array('re' => '/^sha256\$.{0,32}\$[a-fA-F0-9]{64}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'SHA 256d');
		$filters['sha512d'] =  		array('re' => '/^\$S\$[a-zA-Z0-9\/\.]{52}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'SHA 512d');
		$filters['sha256c'] =  		array('re' => '/^\$5\$[a-zA-Z0-9./]{8}\$[a-zA-Z0-9./]{1,}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'SHA256c');
		$filters['sha512c'] =  		array('re' => '/^\$6\$[a-zA-Z0-9./]{8}\$[a-zA-Z0-9./]{1,}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'SHA 512c');
		$filters['sha1hex'] =  		array('re' => '/^[a-fA-F0-9]{40}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'SHA1 Hex');
		$filters['sha1c'] =  		array('re' => '/^\$4\$[a-zA-Z0-9./]{8}\$[a-zA-Z0-9./]{1,}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'SHA1c');
		$filters['sha256cisco'] =  	array('re' => '/^[a-zA-Z0-9]{43}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'SHA 256 cisco');
		$filters['sha224'] =  		array('re' => '/^[a-fA-F0-9]{56}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'SHA 224');
		$filters['sha1'] =  		array('re' => '/^[a-fA-F0-9]{48}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'SHA1');
		$filters['sha256'] =  		array('re' => '/^[a-fA-F0-9]{64}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'SHA256');
		//sql
		$filters['sql5'] =  		array('re' => '/\*[a-f0-9]{40}/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'SQL Version 5 Password');
		$filters['sql4'] =  		array('re' => '/^[a-f0-9]{40}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'SQL Version 4 Password');
		$filters['sql3'] =  		array('re' => '/^[a-fA-F0-9]{16}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'SQL Version 3 Password');
		//ms sql
		$filters['mssql'] =  		array('re' => '/^0x0100[a-f0-9]{0,8}?[a-f0-9]{80}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'MS-SQL Password');
		$filters['mssql05'] =  		array('re' => '/^0x0100[a-f0-9]{0,8}?[a-f0-9]{40}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'MS-SQL 2005 Password');
		$filters['mssql08'] =  		array('re' => '/^0x0100[a-f0-9]{0,8}?[a-f0-9]{40}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'MS-SQL 2008 Password');
		$filters['mssql12'] =  		array('re' => '/^0x02[a-f0-9]{0,10}?[a-f0-9]{128}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'MS-SQL 2012 Password');
		//osx
		$filters['osx8'] =  		array('re' => '/\$ml\$[a-fA-F0-9$]{199}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'OSX 8 Password');
		$filters['osx7']=  			array('re' => '/^[a-fA-F0-9]{136}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'OSX 7 Password');
		// other hash
		$filters['sam'] =  			array('re' => '/^[a-fA-F0-9]{32}:[a-fA-F0-9]{32}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'SAM Hash');
		$filters['crc16'] =  		array('re' => '/^[a-fA-F0-9]{4}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'CRC16 Hash');
		$filters['alder32'] =  		array('re' => '/^[a-f0-9]{8}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'Alder32 Hash');
		$filters['epihash'] =  		array('re' => '/^0x[A-F0-9]{60}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'EPI Hash');
		$filters['ripemd320'] =  	array('re' => '/^[A-Fa-f0-9]{80}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'RIPE MD320 Hash');
		$filters['skein1024'] =  	array('re' => '/^[a-fA-F0-9]{256}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'Skein1024 Hash');
		$filters['ntcrypt'] =  		array('re' => '/^\$3\$[a-zA-Z0-9./]{8}\$[a-zA-Z0-9./]{1,}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'NT Crypt Hash');
		$filters['crc96'] =  		array('re' => '/^[a-fA-F0-9]{24}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'CRC 96 Hash');
		$filters['lotus'] =  		array('re' => '/^\(?[a-zA-Z0-9\+\/]{20}\)?$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'Lotus Hash');
		$filters['minecraft'] =  	array('re' => '/^\$sha\$[a-zA-Z0-9]{0,16}\$[a-fA-F0-9]{64}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'MineCraft Hash');
		$filters['fortigate'] =  	array('re' => '/^[a-fA-F0-9]{47}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'Fortigate Hash');
		$filters['jnetscreen'] =  	array('re' => '/^[a-zA-Z0-9]{30}:[a-zA-Z0-9]{4,}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'jnet Screen Hash');					
		$filters['des'] =  			array('re' => '/^.{0,2}[a-zA-Z0-9\/\.]{11}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'des hash');					
		$filters['bfeggdrop'] =  	array('re' => '/^\+[a-zA-Z0-9\/\.]{12}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'bf eggdrop hash');					
		$filters['bfbsd'] =  		array('re' => '/^\$2a\$[0-9]{0,2}?\$[a-zA-Z0-9\/\.]{53}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'bf bsd hash');					
		$filters['bfc'] =  			array('re' => '/^\$2[axy]{0,1}\$[a-zA-Z0-9./]{8}\$[a-zA-Z0-9./]{1,}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'bfc hash');					
		$filters['smf'] =  			array('re' => '/^[a-fA-F0-9]{40}:[0-9]{8}&/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'smf hash');
		$filters['oracle'] =  		array('re' => '/^S:[A-Z0-9]{60}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'ocacle hash');
		// ip addresses
		$filters['ipv4'] =  		array('re' => '/([0-9]{1,3}\.){3}[0-9]{1,3}/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'IPv4');
		$filters['ipv6'] =  		array('re' => '/(([0-9a-fA-F]{1,4}:){7,7}[0-9a-fA-F]{1,4}|([0-9a-fA-F]{1,4}:){1,7}:|([0-9a-fA-F]{1,4}:){1,6}:[0-9a-fA-F]{1,4}|([0-9a-fA-F]{1,4}:){1,5}(:[0-9a-fA-F]{1,4}){1,2}|([0-9a-fA-F]{1,4}:){1,4}(:[0-9a-fA-F]{1,4}){1,3}|([0-9a-fA-F]{1,4}:){1,3}(:[0-9a-fA-F]{1,4}){1,4}|([0-9a-fA-F]{1,4}:){1,2}(:[0-9a-fA-F]{1,4}){1,5}|[0-9a-fA-F]{1,4}:((:[0-9a-fA-F]{1,4}){1,6})|:((:[0-9a-fA-F]{1,4}){1,7}|:)|fe80:(:[0-9a-fA-F]{0,4}){0,4}%[0-9a-zA-Z]{1,}|::(ffff(:0{1,4}){0,1}:){0,1}((25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9]).){3,3}(25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9])|([0-9a-fA-F]{1,4}:){1,4}:((25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9]).){3,3}(25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9]))/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'IPV6');
		// ssn 
		$filters['ssnus'] =  		array('re' => '/\b(((20)((0[0-9])|(1[0-1])))|(([1][^0-8])?\d{2}))((0[1-9])|1[0-2])((0[1-9])|(2[0-9])|(3[01]))[-+]?\d{4}[,.]?\b/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'American Social Security Number');
		$filters['ssnse'] =  		array('re' => '/(?!(000|666|9))\d{3}-(?!00)\d{2}-(?!0000)\d{4}/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'Swedish Social Security Number');
		$filters['ssncan'] = 		array('re' => '/\b[1-9]\d{2}[- ]?\d{3}[- ]?\d{3}\b/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'Canadian Social Security Number');
		// visa
		$filters['visa'] =  		array('re' => '/^((?!000)(?!666)(?:[0-6]\d{2}|7[0-2][0-9]|73[0-3]|7[5-6][0-9]|77[0-2]))-((?!00)\d{2})-((?!0000)\d{4})$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'Visa CArd');
		$filters['master'] =  		array('re' => '/5[1-5][0-9]{14}/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'Master Card');
		$filters['amex'] =  		array('re' => '/3[47][0-9]{13}/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'American Express');
		$filters['discover'] =  	array('re' => '/6(?:011|5[0-9]{2})[0-9]{12}/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'DiscoverCard');
		// zips
		$filters['uszip'] =  		array('re' => '/^([0-9]{5}(?:-[0-9]{4})?)*$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'American Zipcode');
		$filters['canzip'] =  		array('re' => '/^[ABCEGHJKLMNPRSTVXY][0-9][A-Z] [0-9][A-Z][0-9]$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'Canadian Zipcode');
		$filters['ukzip'] =  		array('re' => '/^([A-Z]{1,2}[0-9][A-Z0-9]? [0-9][ABD-HJLNP-UW-Z]{2})*$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'Uk Zipcode');
		$filters['auzip'] =  		array('re' => '/^((0[289][0-9]{2})|([1345689][0-9]{3})|(2[0-8][0-9]{2})|(290[0-9])|(291[0-4])|(7[0-4][0-9]{2})|(7[8-9][0-9]{2}))*$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'Australia Zipcode');
		// phones
		$filters['usphone'] =  		array('re' => '/^(([0-9]{1})*[- .(]*([0-9]{3})[- .)]*[0-9]{3}[- .]*[0-9]{4})+$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'North America Phone');
		$filters['ukphone'] =  		array('re' => '/^\s*\(?(020[7,8]{1}\)?[ ]?[1-9]{1}[0-9]{2}[ ]?[0-9]{4})|(0[1-8]{1}[0-9]{3}\)?[ ]?[1-9]{1}[0-9]{2}[ ]?[0-9]{3})\s*$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'UK Phone');
		$filters['auphone'] =  		array('re' => '/^\({0,1}((0|\+61)(2|4|3|7|8)){0,1}\){0,1}(\ |-){0,1}[0-9]{2}(\ |-){0,1}[0-9]{2}(\ |-){0,1}[0-9]{1}(\ |-){0,1}[0-9]{3}$/i','total'=>0,'unique'=>0,'raw'=>'' ,'desc'=>'Australian Phone');
		foreach($filters as $f => $h)
			$fff[] = array("name"=>$f,"re"=>$h['re'],"total"=>0,"raw"=>"","unique"=>"");
	return $filters;
	}
}
?>