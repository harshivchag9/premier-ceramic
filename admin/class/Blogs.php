<?php
    class Blogs
    {
        private $sql;
        public function __construct() 
        {
            require_once("../../database/database.config.php");
            $this->sql = Database::getConnection();
        }

        public function getData()
        {
            $response = $this->sql->query("SELECT * FROM `blog`");
            $data = $response->fetch_all(MYSQLI_ASSOC);
            return json_encode($data);
        }

        public function addBlog($title, $description, $file)
        {
            
            $date=date('d-M-Y');

            $v1 = rand(1111,9999);
            $v2 = rand(1111,9999);

            $v3 = $v1 . $v2;
            $v3 = md5($v3); 
            $fnm=$file["blogImage"]["name"];
            $a='../img/blog/'.$v3.$fnm;
            $des='img/blog/'.$v3.$fnm;
            if(move_uploaded_file($file["blogImage"]["tmp_name"],'../'.$a))
            {
                $this->sql->query("INSERT INTO `blog`(`blog_id`, `title`, `date`, `description`, `blogimage`) VALUES ('','$title','$date','$description','$des')");
            } 	
        }

        public function updateBlog($id, $title, $description, $path, $file)
        {
            if($file['updateBlogImage']['size']==0){
                $date=date('d-M-Y');
                $this->sql->query("UPDATE `blog` SET `title`='$title',`date`='$date',`description`='$description' WHERE `blog_id`='$id'");
            }else {
                
                $v1 = rand(1111,9999);
                $v2 = rand(1111,9999);
    
                $v3 = $v1 . $v2;
                $v3 = md5($v3); 
                $fnm=$file["updateBlogImage"]["name"];
                $a='../img/blog/'.$v3.$fnm;
                $des='img/blog/'.$v3.$fnm;
                $date=date('d-M-Y');
                
                if($this->sql->query("UPDATE `blog` SET `title`='$title',`date`='$date',`description`='$description', `blogimage` ='$des' WHERE `blog_id`='$id'"))
                {
                    move_uploaded_file($file["updateBlogImage"]["tmp_name"],'../'.$a); 	
                    unlink($path);
                }

            }
        }
        
        public function deleteBlog($id)
        {
            $path = $this->sql->query("SELECT blogimage FROM `blog` WHERE `blog_id` = $id LIMIT 1")->fetch_assoc()['blogimage'];
            if($this->sql->query("delete from blog where blog_id=$id"))
            {
                unlink('../../'.$path);
            }
        }

    }

?>