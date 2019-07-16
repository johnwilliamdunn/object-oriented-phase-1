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
	 * @var authorHash
	 **/
   private $authorHash;
   /** authorUsername provides unique sign on name
	 * @var authorUsername
	 **/
   private $authorUsername;
   /**accessor method for obtaining author id
	 * @return authorEmail
	 **/
   public function getauthorId() {
   	return ($this->authorId);
	}
	/**accessor method for obtaining author avatar id
	 * @return authorAvatarUrl
	 **/
	public function getauthorAvatarUrl() {
		return ($this->authorAvatarUrl);
	}
	/**accessor method for obtaining


}
