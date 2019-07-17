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
	/**
	 * id for the author; this is the primary key
	 * @var Uuid $authorId;
	 **/
	private $authorId;
/** avatarUrl value for author's avatar image
 * @var string $authorAvatarId;
 **/
   private $authorAvatarUrl;
/** authorActivationToken that is for activation/verification
 * @var string $authorActivationToken;
 **/
   private $authorActivationToken;
   /** authorEmail provides the author's email address
	 * @var string $authorEmail;
	 **/
   private $authorEmail;
   /** authorHash provides login password
	 * @var string $authorHash;
	 **/
   private $authorHash;
   /** authorUsername provides unique sign on name
	 * @var  string $authorUsername;
	 **/
   private $authorUsername;

	/**
	 * constructor for Author
	 *
	 * @param Uuid $authorId id of author user
	 * @param string $authorAvatarUrl url for author avatar
	 * @param string $authorActivationToken for verification/activation
	 */
   /**accessor method for obtaining author id
	 * @var string $authorId
	 **/
   public function getauthorId() {
   	return ($this->authorId);
	}
	/**accessor method for obtaining author avatar id
	 * @var string $authorAvatarUrl
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

/**
 * mutator method for author content
 *
 * @param Uuid\ string $newAuthorId new value for author id
 * @throws \InvalidArgumentException if $setAuthorId is not a string or insecure
 * @throws \RangeException if $setAuthorId is > 140 characters
 * @thros \TypeError if $setAuthorId is not a string
 **/
public function setAuthorId(string $newAuthorId) : void {
	try {
		         //validate uuid for authorId//
		$uuid = self::validateUuid($newAuthorId);
	} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		$exceptionType = get_class($exception);
		throw(new $exceptionType($exception->getMessage(), 0, $exception));
	}

	// convert and store the author id
	$this->authorId = $uuid;
}

/**
 * mutator method for author content
 *
 * @param Uuid\ string $newAuthorAvatarUrl new value for author avatar url
 * @throws \InvalidArgumentException if $setAuthorId is not a string or insecure
 * @throws \RangeException if $setAuthorId is > 140 characters
 * @thros \TypeError if $setAuthorId is not a string
 **/
public function setAuthorId(string $newAuthorId) : void {
	try {
		//validate uuid for authorId//
		$uuid = self::validateUuid($newAuthorId);
	} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		$exceptionType = get_class($exception);
		throw(new $exceptionType($exception->getMessage(), 0, $exception));
	}

	// convert and store the author id
	$this->authorId = $uuid;
}
};
