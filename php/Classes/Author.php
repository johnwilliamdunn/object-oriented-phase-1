<?php
namespace jdunn33@cnm.edu;

require_once("autoload.php");
require_once(dirname(__DIR__) . "/vendor/autoload.php");

use http\Encoding\Stream;
use http\QueryString;
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
			$this->setAuthorEmail($newAuthorEmail);
			$this->setAuthorHash($newAuthorHash);
			$this->setAuthorUsername($newAuthorUsername);
		}
			//determine what exception type was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
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
 * @param string $newAuthorAvatarUrl new set for author avatar url
 * @throws \InvalidArgumentException if $setAuthorAvatarUrl is not a string or insecure
 * @throws \RangeException if $setAuthorAvatarUrl is > 140 characters
 * @thros \TypeError if $setAuthorAvatarUrl is not a string
 **/
public function setAuthorAvatarUrl(string $newAuthorAvatarUrl) : void {
	try {
		//validate url for author//
		$newAuthorAvatarUrl = trim($newAuthorAvatarUrl);
		$newAuthorAvatarUrl = filter_var($newAuthorAvatarUrl, FILTER_SANITIZE_URL);

		if(strlen($newAuthorAvatarUrl) !=0) {
			throw (new \RangeException("URL id too large"));
		}

		//store Author Avatar Url//
		$this->AuthorAvatarUrl = $newAuthorAvatarUrl;
	}

	/**
	 * mutator for author verification
	 *
	 * @param string $newAuthorActivationToken author verification token
	 * @throw \RangeException if exceeds character limit
	 * @throw \TypeError if type is not a string
	 **/
	public function setAuthorActivationToken(string $newAuthorActivationToken) {

		$newAuthorActivationToken = filter_var($newAuthorActivationToken, FILTER_SANITIZE_STRING);
		//if string is too long throw range exception//
		if(strlen($newAuthorActivationToken)) {
			throw (new \TypeError("Invalid length"));
		}
		$this->AuthorActivationToken = $newAuthorActivationToken;
}

		/**
		 * mutator for author email
		 *
		 * @param string $newAuthorEmail author email provided
		 * @throw \RangeException if exceeds character limits
		 * @throw \TypeError if value type is not correct
		 **/
		public function setAuthorEmail($newAuthorEmail) {
			$newAuthorEmail = filter_var($newAuthorEmail, FILTER_SANITIZE_STRING);
			//if character string is too long throw error exception//
		if(strlen($newAuthorEmail)) {
			throw(new \TypeError("invalid length"));
		}
		$this->AuthorEmail = $newAuthorEmail;
}

		/**
		 *mutator for Hash/passwrd
		 *
		 * @param string $newAuthorHash value for hash/passwrd
		 * @throw \RangeException if exceeds character limits
		 * @throw \TypeError if value type is not correct
 		**/
		public function setAuthorHash($newAuthorHash) {
		$newAuthorHash = filter_var($newAuthorHash,FILTER_SANITIZE_STRING);
		//if character string is too long throw error exception//
		if(strlen($newAuthorHash)) {
		throw(new \TypeError("invalid length"));
		}
		$this->authorHash = $newAuthorHash;
	}
		/**
		 * mutator for author user name
		 *
		 * @param string $newAuthorUserName username provided by user
		 * @throw \RangeException
		 * @throw \TypeError if value type is not correct
		 **/
		public function setAuthorUserName($newAuthorUserName) {
			$newAuthorUserName = filter_var($newAuthorUserName, FILTER_SANITIZE_STRING);
			//if character string is too long throw exceptiion//
		if(strlen($newAuthorUserName) >32) {
			throw(new \RangeException("invalid exceeds length (32 characters"));

		}
		$this->authorUsername = $newAuthorUserName;

	}
/**
 * formats the state variables for JSON serialization
 *
 * @return array resulting state variables to serialize
 **/
	public function jsonSerialize() : array {
		$fields = get_object_vars($this);

		$fields["authorId"] = $this->authorId->toString();
		$fields["authorAvatarUrl"] = $this->authorAvatarUrl->toString();
		$fields["authorActivationToken"] =

		//format the date so that the front end can consume it
		$fields["tweetDate"] = round(floatval($this->tweetDate->format("U.u")) * 1000);
		return($fields);
	}


};
