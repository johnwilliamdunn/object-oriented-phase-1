<?php
namespace jdunn33;
/**Adding Class
*
**/
class author implements /JsonSerializable {
	use ValidateAuthor;
	use ValidateAuthorId;
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
	public function getauthorHash
	   return ($this->authorHash);
	/**accessor method for authorUsername
	 * @var string authorUserName
	 **/
	public function getauthorUserName
	    return ($this->authorUserName);


}
