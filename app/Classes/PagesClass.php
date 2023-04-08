<?php
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;

class PagesClass
{
    /**
	 * ! Function that gets last id from a table
	 * @param $table
	 * @return id + 1;
	 */
	static function getLastId($table){
        $table = DB::table($table)->orderByDesc('id')->first();

        if(!is_null($table))
            return $table->id + 1;
        else
            return 1;
    }

    static function db2URL($name, $locale=''){
		$ret_str = trim($name);
		$ret_str = str_ireplace(" ", "-", $ret_str);
		$ret_str = strtolower($ret_str);

		if(is_null($locale))
			return self::getLocalization().$ret_str;
		else
			return $ret_str;
	}

	static function URL2db($name){
		$ret_str = trim($name);
		$ret_str = str_ireplace(" ", "-", $ret_str);
		$ret_str = strtolower($ret_str);

		return $ret_str;
	}

	static function db2Display($name){
		$ret_str = trim($name);
		$ret_str = str_ireplace("-", " ", $ret_str);
		$ret_str = ucwords($ret_str);

		return $ret_str;
	}

    static function printLink($link, $text){
		?>
			<a href="<?php echo $link; ?>"><?php echo $text; ?></a>
		<?php
	}

    /**
	 *
     * ! Function that changes name to clear form  
     * ? Name doesn't contain any symbols 
     * Uses trim to remove white space at beginning and at the end 
     * TODO Example bonheur-bercove
     * @var name
	 * @return $name;
     *
     */
	static function cleanName($name){
		$name = preg_replace('~[^a-zA-Z0-9 -]+~', '', $name);
		$name = self::URL2db($name, $table='users');
		return $name;
	}

    static public function setCookies($name, $value, $minutes, $path='', $domain='', $secure='', $httpOnly=''){
		Cookie::queue($name, $value, $minutes);
	}

	static public function getCookies($name){
		return Cookie::get($name);
	}
}