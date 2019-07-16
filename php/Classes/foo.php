<?php
namespace jdunn33;

require_once("autoload.php");
require_once(dirname(__DIR__) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;

/**Adding Class
*
**/
class author implements \JsonSerializable {
	use ValidateDate;
	use ValidateUuid;
	/**id for the author; this is the primary key
	 * @var Uuid $authorId
	 **/
	private $authorId;
/** avatarUrl of the Author that is sent, this is the Foriegn Key
 * @var Uuid authorAvatarId
 **/
   private $authorAvatarUrl;
/** authorActivationToken that is sent for security purposes
 * @var Uuid authorActivationToken
 **/
   private $authorActivationToken;
   /** authorEmail provides the author's email address
	 * @var Uuid authorEmail
	 **/
   private $authorEmail;
   /** authorHash provides login password
	 * @var string authorHash
	 **/
   private $authorHash;
   /** authorUsername provides unique sign on name
	 * @var  string authorUsername
	 **/
   private $authorUsername;
   /**accessor method for obtaining author id
	 * @var string authorEmail
	 **/
   public function getauthorId() {
   	return ($this->authorId);
	}
	/**accessor method for obtaining author avatar id
	 * @var string authorAvatarUrl
	 **/
	public function getauthorAvatarUrl() {
		return ($this->authorAvatarUrl);
	}
	/**accessor method for obtaining
	 * @var string authorActivationToken
	 **/
	public function getauthorActivationToken() {
		return ($this->authorActivationToken);
	}
	/**accessor method for obtaining authorEmail
	 * @var string authorEmail
	 **/
	public function getauthoremail() {
		return ($this->authorEmail);
	}
	/**accessor method for obtaining authorHash
	 * @var string authorHash
	 **/
	public function getauthorHash() {
		return ($this->authorHash);
	}
	/**accessor method for authorUsername
	 * @var string authorUserName
	 **/
	public function getauthorUserName
	    return ($this->authorUserName);

public function __set($authorId, $value)
{
	$mutator = 'set' . ucfirst($authorId);
	if (method_exists($authorId, $mutator) && is_callable(array($authorId, $mutator)))
	{
		$authorId->$mutator($value);
	}
	throw new Exception("{$authorId} is an invalid property.");
}
public function __set($authorAvatarUrl, $value)
{
	$mutator = 'set' . ucfirst($AuthorAvatarUrl);
	if (method_exists($authorAvatarUrl, $mutator) && is_callable(array($authorAvatarUrl, $mutator)))
	{
		$authorAvatarUrl->$mutator($value);
	}
	throw new Exception("{$authorAvatarUrl} is an invalid property.");
}
public function __set($name, $value)
{
	$mutator = 'set' . ucfirst($authorActivationToken);
	if (method_exists($authorActivationToken, $mutator) && is_callable(array($authorActivationToken, $mutator)))
	{
		$authorActivationToken->$mutator($value);
	}
	throw new Exception("{$authorActivationToken} is an invalid property.");
}
public function __set($authorEmail, $value)
{
	$mutator = 'set' . ucfirst($authorEmail);
	if (method_exists($authorEmail, $mutator) && is_callable(array($authorEmail, $mutator)))
	{
		$this->$mutator($value);
	}
	throw new Exception("{$authorEmail} is an invalid property.");
}
public function __set($authorHash, $value)
{
	$mutator = 'set' . ucfirst($authorHash);
	if (method_exists($authorHash, $mutator) && is_callable(array($authorHash, $mutator)))
	{
		$authorHash->$mutator($value);
	}
	throw new Exception("{$authorHash} is an invalid property.");
}
public function __set($authorUsername, $value)
{
	$mutator = 'set' . ucfirst($authorUsername);
	if (method_exists($authorUsername, $mutator) && is_callable(array($authorUsername, $mutator)))
	{
		$authorUsername->$mutator($value);
	}
	throw new Exception("{$authorUsername} is an invalid property.");
}
}
}
