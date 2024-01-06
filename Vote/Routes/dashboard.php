<?php
session_start();
if(!isset($_SESSION['userdata']))
{
    header("location: ../");
}
$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if($_SESSION['userdata']['status']==0){
    $status = '<b style="color:red"> Not  Voted </b>';
}
else{
    $status = '<b style="color:green"> Voted </b>';

}
?>
width status=





<html> 
    <head>
        <title> Online Voting System - Dashboard </title>
        <link rel="stylesheet" href="../css/stylesheet.css">

    </head> 
    <body >
        <style>
            #Profile{
                background-color: white;
                width:30%;
                padding:20px;
                float:left;

            }

            #Group{
                background-color: white;
                            width:60%;
                padding:20px;
                float:right;

            }
            #votebtn{
                padding:5px;
                font-size:15px;
                background-color:#3498db;
                color:white;
                border-radius:5px;
            }
            #mainpanel {
                padding:10px;

            }
            #headersection{
                padding:10px;
            }

            #voted{
                padding:5px;
                font-size:15px;
                background-color:green;
                color:white;
                border-radius:5px;

            }
            
            </style>

 <div id="mainSection"> 
     <center>
  <div id="headersection">
       <a href="../"> <button style="padding: 7px;
            border-radius: 5px;
            background-color: cyan;
            color: brown; 
            float: left; 
            margin: 10px;
            ">
              <b>  Back </b>
        </button></a>


        
        <a href ="logout.php"><button style="padding: 7px;
            border-radius: 5px;
            background-color: cyan;
            color: brown; 
            float: right;
            margin: 10px;
            ">
              <b>  LogOut </b>
            </button></a>

        <h1 id="headerreg" > Online Voting System - Dashboard </h1>
   </div>
</center>
   <hr style="height:2px;border-width:0;color:black;background-color:black">
   <div id="mainpanel">  
   <div id="Profile">
       <center><img src= "../uploads/<?php echo $userdata['photo']?>" height="100" width="100"></center>
       <br><br>
       <b id="lobel">  Name: </b><?php echo $userdata['name'] ?> <br><br>
       <b id="lobel"> Mobile: </b> <?php echo $userdata['mobile'] ?><br><br>
       <b id="lobel"> Address: </b><?php echo $userdata['address']?><br><br>e
       <b id="lobel"> Status: </b><?php echo $status ?><br><br><br>
    </div>

   <div id="Group">
   <?php
   if($_SESSION['groupsdata'])
   { 
       for($i=0;$i<count($groupsdata);$i++)
       {
           ?>
           <div>
               <img style="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="100" width="100">
               <b id="lobel">Group Name:</b> <?php echo $groupsdata[$i]['name'] ?></br></br>
               <b id="lobel"> Votes:</b> <?php echo $groupsdata[$i]['votes'] ?></br></br>
               
               <form action="../api/vote.php" method="POST">
                   <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                   <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                   <?php
                   if($_SESSION['userdata']['status']==0){
                       ?>
                       <input type="submit" name="votebtn" value="vote" id="votebtn">

                       <?php
                   }
                else{
                    ?>
                    <button disabled id= "voted" type="button" name="votebtn" value="vote"> Voted </button>
                    <?php
                }

                   ?>
                   
             </form>
             <hr></br>
           <?php
       }


   }
   else{

   }
   ?> </div>   
   <div>
 </div>w
        
        

</body>
</html>  