<?php
namespace classes;
interface Admin
{
    public function LoginUser($username, $password);
    // public function logout();

}
interface CategoryInterface
{
    public function showCategory();
    public function showCategoryID($catId);
    public function categoryCount();
    public function addCategory($data);
    public function getCategoryById($categoryId);
    public function getContentByCategoryId($categoryId);
    public function updateCategory($data, $id);
    public function delCategory($id);

}
interface ContentInterface
{
    public function showContent();
    public function addContent($data, $file);
    public function  allStudent();
    public function contentCount();
    public function getContentById($id);
    public function updateContent($data, $file, $id);
    public function delContent($id);
   

}

interface CommentInterface
{
    public function showComment($postId);
    public function showAllComments();
    public function getCommentId($id);
    public function getCommentById($id);
    public function commentCount();
    public function addComment($data, $id);
    public function updateComment($data, $id);
    public function delComment($id);


}

interface MessageInterface
{
    public static function flash();
    public static function Success();
}



interface TagInterface
{
    public function showTag();
    public function showCategoryID($catId);
    public function tagCount();
    public function addCategory($data);
    public function getTagById($categoryId);
    public function getContentByTagId($categoryId);
    public function updateTag($data, $id);

}
?>