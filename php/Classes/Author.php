<?php

namespace Jdunn\ObjectOriented;

require_once("Autoload.php");
require_once(dirname(__DIR__) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;

/**Class Author
 * @package Jdunn\ObjectOriented
 **/
class Author implements \JsonSerializable {
	use ValidateUuid;

	/**
	 * id for the author; this is the primary key
	 * @var Uuid $authorId ;
	 **/
	private $authorId;
	/** avatarUrl value for author's avatar image
	 * @var string $authorAvatarId ;
	 **/
	private $authorAvatarUrl;
	/** authorActivationToken that is for activation/verification
	 * @var string $authorActivationToken ;
	 **/
	private $authorActivationToken;
	/** authorEmail provides the author's email address
	 * @var string $authorEmail ;
	 **/
	private $authorEmail;
	/** authorHash provides login password
	 * @var string $authorHash ;
	 **/
	private $authorHash;
	/** authorUsername provides unique sign on name
	 * @var  string $authorUsername ;
	 **/
	private $authorUsername;

	/**
	 * constructor for Author
	 *
	 * @param string|Uuid $newAuthorId id of this Author or null if a new Author
	 * @param string $newAuthorActivationToken activation token to safe guard against malicious accounts
	 * @param string $newAuthorUsername string containing newAuthorUserName
	 * @param string $newAuthorAvatarUrl string containing newAuthorUserName can be null
	 * @param string $newAuthorEmail string containing email
	 * @param string $newAuthorHash string containing password hash
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if a data type violates a data hint
	 * @throws \Exception if some other exception occurs
	 **/

	public function __construct($newAuthorId, $newAuthorAvatarUrl, $newAuthorActivationToken, $newAuthorEmail, $newAuthorHash, $newAuthorUsername) {
		try {
			$this->setAuthorId($newAuthorId);
			$this->setAuthorAvatarUrl($newAuthorAvatarUrl);
			$this->setAuthorActivationToken($newAuthorActivationToken);
			$this->setAuthorEmail($newAuthorEmail);
			$this->setAuthorHash($newAuthorHash);
			$this->setAuthorUsername($newAuthorUsername);
		} //determine what exception type was thrown
		catch(\InvalidArgumentException |\RangeException |\Exception |\TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**accessor method for obtaining author id
	 * @return  string $authorId
	 **/
	public function getAuthorId() {
		return ($this->authorId);
	}

	/**
	 * mutator method for author content
	 *
	 * @param Uuid| string $newAuthorId value of new author id
	 * @throws \RangeException if $newAuthorId is not positive
	 * @throws \TypeError if the profile Id is not
	 **/
	public function setAuthorId($newAuthorId): void {
		try {
			$uuid = self::validateUuid($newAuthorId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the profile id
		$this->authorId = $uuid;
	}

	/**accessor method for obtaining author avatar id
	 * @return  string value of $authorAvatarUrl
	 **/
	public function getAuthorAvatarUrl(): ?string {
		return ($this->authorAvatarUrl);
	}

	/**
	 * mutator method for author content
	 *
	 * @param string $newAuthorAvatarUrl new set for author avatar url
	 * @throws \InvalidArgumentException if $setAuthorAvatarUrl is not a string or insecure
	 * @throws \RangeException if $setAuthorAvatarUrl is > 140 characters
	 **/
	public function setAuthorAvatarUrl(?string $newAuthorAvatarUrl): void {

		//validate url for author//
		$newAuthorAvatarUrl = trim($newAuthorAvatarUrl);
		$newAuthorAvatarUrl = filter_var($newAuthorAvatarUrl, FILTER_SANITIZE_URL, FILTER_FLAG_NO_ENCODE_QUOTES);

		if(strlen($newAuthorAvatarUrl) > 255) {
			throw (new \RangeException("image url is too large"));
		}
		//store Author Avatar Url//
		$this->authorAvatarUrl = $newAuthorAvatarUrl;

	}

	/**accessor method for obtaining
	 * @return string value authorActivationToken
	 **/
	public
	function getAuthorActivationToken() {
		return ($this->authorActivationToken);
	}

	/**
	 * mutator for author verification
	 *
	 * @param string $newAuthorActivationToken author verification token
	 * @throws \RangeException if exceeds character limit
	 * @throws \TypeError if type is not a string
	 **/
	public
	function setAuthorActivationToken(?string $newAuthorActivationToken) {
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
	 * @return  string authorEmail
	 **/

	public function getAuthorEmail() {
		return ($this->authorEmail);
	}

	/**
	 * mutator for author email
	 *
	 * @param string $newAuthorEmail new value of email
	 * @throws \InvalidArgumentException if $newEmail is not a valid email or insecure
	 * @throws \RangeException if $newEmail is > 128 characters
	 * @throws \TypeError if $newEmail is not a string
	 **/

	public function setAuthorEmail(?string $newAuthorEmail): void {
		// verify the email is secure
		$newAuthorEmail = trim($newAuthorEmail);
		$newAuthorEmail = filter_var($newAuthorEmail, FILTER_VALIDATE_EMAIL);
		if(empty($newAuthorEmail) === true) {
			throw(new \InvalidArgumentException("profile email is empty or insecure"));
		}
		// verify the email will fit in the database
		if(strlen($newAuthorEmail) > 128) {
			throw(new \RangeException("profile email is too large"));
		}
		// store the email
		$this->authorEmail = $newAuthorEmail;
	}

	/**
	 * accessor method for obtaining authorHash
	 * @var string authorHash
	 **/

	public function getAuthorHash() {
		return ($this->authorHash);
	}

	/**
	 * mutator for Hash/passwrd
	 *
	 * @param string $newProfileHash
	 * @throws \InvalidArgumentException if the hash is not secure
	 * @throws \RangeException if the hash is not 128 characters
	 * @throws \TypeError if profile hash is not a string
	 */

	public function setAuthorHash(?string $newAuthorHash): void {
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

	/**
	 * accessor method for authorUsername
	 * @return string authorUserName
	 **/

	public function getAuthorUsername(): ?string {
		return $this->authorUsername;
	}

	/**
	 * mutator for author user name
	 *
	 * @param string $newAuthorUserName username provided by user
	 * @throws \RangeException
	 * @throws \TypeError if value type is not correct
	 **/

	public function setAuthorUserName($newAuthorUserName) {
		$newAuthorUserName = filter_var($newAuthorUserName, FILTER_SANITIZE_STRING);
		//if character string is too long throw exception//
		if(strlen($newAuthorUserName) > 32) {
			throw(new \RangeException("invalid, exceeds length (32 characters"));
		}
		$this->authorUsername = $newAuthorUserName;

	}


	/**
	 * inserts this Author into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo): void {
		//create query template//
		$query = "INSERT INTO author(authorId, authorAvatarUrl, authorActivationToken, authorEmail, authorHash, authorUserName) 
		VALUES (:authorId, :authorAvatarUrl, :authorActivationToken, :authorEmail, :authorHash, :authorUserName)";
		$statement = $pdo->prepare($query);

		$parameters = ["authorId" => $this->authorId->getBytes(), "authorActivationUrl" => $this->authorAvatarUrl, "authorActivationToken" => $this->authorActivationToken, "authorEmail" => $this->authorEmail, "authorHash" => $this->authorHash, "authorUserName" => $this->authorUserName];
		$statement->execute($parameters);

	}


	/**
	 * updates this Author from mySQL
	 *
	 * #param \PDO $pdo PDO connection object
	 * #throws \PDOException when mySQL related errors occur
	 *
	 **/
	public function update(\PDO $pdo): void {

		//create query template//
		$query = "UPDATE author SET authorAvatarUrl = :authorAvatarUrl, authorActivationToken = :authorActivationToken, authorEmail = :authorEmail, authorHash = :authorHash, authorUserName = :authorUserName WHERE  authorId = :authorId";
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holders in the template

		$parameters = ["authorId" => $this->authorId->getBytes(), "authorAvatarUrl" => $this->authorAvatarUrl, "authorActivationToken" => $this->authorActivationToken, "authorEmail" => $this->authorEmail, "authorHash" => $this->authorHash, "authorUserName" => $this->authorUsername];
		$statement = $pdo->execute($parameters);
	}


	/**
	 * deletes this Author from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 *
	 *
	 **/
	public function delete(\PDO $pdo): void {

		//create query template//
		$query = "DELETE FROM author WHERE authorId = :authorId";
		$statement = $pdo->prepare($query);

		//bind the member variables to the placeholders in the template
		$parameters = ["authorId" => $this->authorId->getBytes()];
		$statement->execute($parameters);
	}


	/**
	 * gets Author by authorId
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param Uuid|string $authorId author id to search for
	 * @return Author|null author found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when a variable are not the correct data type
	 *
	 **/
	public static function getAuthorByAuthorId(\PDO $pdo, $authorId): ?Author {
		//sanitize the authorId before searching//
		try {
			$authorId = self::validateUuid($authorId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}

		//create query template//
		$query = "SELECT authorId, authorAvatarUrl, authorActivationToken, authorEmail, authorHash, authorUserName FROM author WHERE authorId = :authorId";
		$statement = $pdo->prepare($query);

		//bing the author id to the place holder in the template
		$parameters = ["authorId" => $authorId->getBytes()];
		$statement->execute($parameters);

		//grab the authorId from mySQL//
		try {
			$author = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$author = new Author($row["authorId"], $row["authorAvatarUrl"], $row["authorUserName"]);

			}
		} catch(\Exception $exception) {
			//if the row couldn't be converted rethrow it//
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($author);
	}

	/**
	 * gets authors by authorUserName
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param \SplFixedArray SplFixedArray of Authors found or null if not found
	 * @return \SplFixedArray SplFixedArray of authors found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 *
	 */

	public static function getAllAuthors(\PDO $pdo): \SplFixedArray {

		//create query template//
		$query = "SELECT authorId, authorAvatarUrl, authorUserName FROM author WHERE authorUserName = :authorUserName";
		$statement = $pdo->prepare($query);
		$statement->execute();

		//build an array of authors//
		$author = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$author = new Author($row["authorUserName"], $row["authorId"]);
				$author[$author->key()] = $author;
				$author->next();


			} catch(\Exception $exception) {

				//if the row couldn't be converted, rethrow it
				throw(new \PDOException(($exception->getMessage(), 0, $exception)));
				}

		}
		return ($author);
	}

	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/

	public function jsonSerialize(): array {
		$fields = get_object_vars($this);

		$fields["authorId"] = $this->authorId->toString();

		return ($fields);

	}


}
