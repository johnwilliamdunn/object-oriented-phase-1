<?php
namespace Jdunn\ObjectOriented;

require_once("Autoload.php");
require_once (dirname(__DIR__) . "/vendor/autoload.php");

use Deepdivedylan\DataDesign\ValidateDate;
use Ramsey\Uuid\Uuid;

/**Class Author
* @package Jdunn\ObjectOriented
**/
class Author implements \JsonSerializable {
	use ValidateUuid;
	use ValidateDate;

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
	 * @param Uuid $newAuthorId id of author user
	 * @param string $newAuthorAvatarUrl url for author avatar
	 * @param string $newAuthorActivationToken for verification/activation
	 * @param string $newAuthorEmail author email address initial submission
	 * @param string $newAuthorHash author created password stored here
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 **/

	public function __construct($newAuthorId, $newAuthorAvatarUrl,$newAuthorActivationToken, $newAuthorEmail, $newAuthorHash, $newAuthorUsername) {
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
   public function getAuthorId() {
   	return ($this->authorId);
	}

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
	/**accessor method for obtaining author avatar id
	 * @var string $authorAvatarUrl
	 **/
	public function getAuthorAvatarUrl() : string {
		return ($this->authorAvatarUrl);
	}

	/**
	 * mutator method for author content
	 *
	 * @param string $newAuthorAvatarUrl new set for author avatar url
	 * @throws \InvalidArgumentException if $setAuthorAvatarUrl is not a string or insecure
	 * @throws \RangeException if $setAuthorAvatarUrl is > 140 characters
	 * @thros \TypeError if $setAuthorAvatarUrl is not a string
	 **/
	public function setAuthorAvatarUrl($newAuthorAvatarUrl)  {
		try {
			//validate url for author//
			$newAuthorAvatarUrl = trim($newAuthorAvatarUrl);
			$newAuthorAvatarUrl = filter_var($newAuthorAvatarUrl, FILTER_SANITIZE_URL, FILTER_FLAG_NO_ENCODE_QUOTES);

			if(strlen($newAuthorAvatarUrl) >255) {
				throw (new \RangeException("URL id too large"));
			}
			if(!is_string($newAuthorAvatarUrl)) {
				throw(new\TypeError("Invalid type, expected type string"));
			}
			//store Author Avatar Url//
			if(filter_var($newAuthorAvatarUrl, FILTER_VALIDATE_URL)) {
				$this->AuthorAvatarUrl = $newAuthorAvatarUrl;
			}

	/**accessor method for obtaining
	 * @var string authorActivationToken
	 **/
	public function getAuthorActivationToken() {
		return ($this->authorActivationToken);
	}

	/**
	 * mutator for author verification
	 *
	 * @param string $newAuthorActivationToken author verification token
	 * @throw \RangeException if exceeds character limit
	 * @throw \TypeError if type is not a string
	 **/
	public function setAuthorActivationToken(string $newAuthorActivationToken) {
			$newAuthorActivationToken = trim($newAuthorActivationToken);
			$newAuthorActivationToken = filter_var($newAuthorActivationToken, FILTER_SANITIZE_STRING);
			//if string is too long throw range exception//
			if(strlen($newAuthorActivationToken) > 32) {
				throw (new \RangeException("Invalid length"));
			}
			//if argument is not a string, throw type exception//
				if(!is_string($newAuthorActivationToken)) {
					throw(new\TypeError("Invalid type, expected type string"));
			}

			$this->authorActivationToken = $newAuthorActivationToken;
		}

	/**accessor method for obtaining authorEmail
	 * @var string authorEmail
	 **/
	public function getAuthoremail() {
		return ($this->authorEmail);
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


	/**accessor method for obtaining authorHash
	 * @var string authorHash
	 **/
	public function getAuthorHash() {
		return ($this->authorHash);
	}

	/**
	 *mutator for Hash/passwrd
	 *
	 * @param string $newProfileHash
	 * @throws \InvalidArgumentException if the hash is not secure
	 * @throws \RangeException if the hash is not 128 characters
	 * @throws \TypeError if profile hash is not a string
	 */
			public function setAuthorHash(string $newAuthorHash): void {
				//enforce that the hash is properly formatted
				$newAuthorHash = trim($newAuthorHash);
				if(empty($newAuthorHash) === true) {
					throw(new \InvalidArgumentException("profile password hash empty or insecure"));
				}
				//enforce the hash is really an Argon hash
				$authorHashInfo = password_get_info($newAuthorHash);
				if($authorHashInfo["algoName"] !== "argon2i") {
					throw(new \InvalidArgumentException("profile hash is not a valid hash"));
				}
				//enforce that the hash is exactly 97 characters.
				if(strlen($newAuthorHash) !== 97) {
					throw(new \RangeException("profile hash must be 97 characters"));
				}
				//store the hash
				$this->authorHash = $newAuthorHash;
			}

	/**accessor method for authorUsername
	 * @var string authorUserName
	 **/
	public function getAuthorUserName
	    return ($this->authorUserName);


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

		return($fields);

	}
}
