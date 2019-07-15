<?php
namespace jdunn33;
//Adding Class//
class author implements /JsonSerializable {
	use ValidateAuthor;
	use ValidateAuthorId;
	//id for the author; this is the primary key//
	private $authorId;

}
