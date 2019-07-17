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
	 * @param string $authorEmail author email address initial submission
	 * @param string $authorHash author created password stored here
	 * @param string $authorUserName user name created stored here
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */

	public function __construct($authorId, $authorActivationToken, $authorEmail, $authorHash, $authorUsername) {
		try {
			$this->setAuthorId($newAuthorId);
			$this->setAuthorAvatarUrl($newAuthorAvatarUrl);
			$this->setAuthorActivationToken($newAuthorActivationToken);
		}
	}

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
