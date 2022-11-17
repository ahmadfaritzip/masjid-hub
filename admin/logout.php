<?php                                                                                                                                                  
// menghapus semua session                                                                                                                             
session_destroy();                                                                                                                                     
                                                                                                                                                       
header("Location:  ".base_url('?page=home'));                                                                                                         
?>