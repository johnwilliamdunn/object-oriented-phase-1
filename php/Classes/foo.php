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
/** avatarUrl of the Author that is sent, this is the Foriegn Key
 * @var string $authorAvatarId;
 **/
   private $authorAvatarUrl;
/** authorActivationToken that is sent for security purposes
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
 * @param string $setAuthorId new value for author id
 * @throws \InvalidArgumentException if $setAuthorId is not a string or insecure
 * @throws \RangeException if $setAuthorId is > 140 characters
 * @thros \TypeError if $setAuthorId is not a string
 **/
public function setAuthorContent(string $newAuthorId) : void {
	// verify the tweet content is secure
	$newTweetContent = trim($newTweetContent);
	$newTweetContent = filter_var($newTweetContent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if(empty($newTweetContent) === true) {
		throw(new \InvalidArgumentException("tweet content is empty or insecure"));
	}

	// verify the tweet content will fit in the database
	if(strlen($newTweetContent) > 140) {
		throw(new \RangeException("tweet content too large"));
	}

	// store the tweet content
	$this->tweetContent = $newTweetContent;
}
};
