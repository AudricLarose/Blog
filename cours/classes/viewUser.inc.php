
<?php

class viewUser extends User {
   

    public function showAllUsers(){
   $datas = $this->getAllUsers();
        foreach ($datas as $data){
            echo $data['id'].'<br>';
            echo $data['title'].'<br>';
            echo $data['body'].'<br>';
            
        }
        
    }
    
}