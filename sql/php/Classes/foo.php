<?php
namespace jdunn33;
//Adding Class//
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
 * @var Uuid authorActivation token
 */
   private $authorActivationToken;
   /**

}
