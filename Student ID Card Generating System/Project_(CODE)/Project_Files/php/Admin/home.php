<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN Page</title>
</head>
<body>
<?php 
include 'navigation.php';
?>
<h1 >Student ID Generator System</h1>
<h2></h2>
<p >
    The aim of this project is to develop a Student ID Card Generation System to streamline the process of creating 
    and managing data. This system will not only enhance efficiency but also provide a seamless solution for the 
    generation and management of student ID cards, simplifying administrative tasks for educational establishments. 
    By implementing this technology, the project seeks to optimize the overall identification process and ensure 
    accurate record-keeping.   
</p ><p >
    On the management side, it takes a considerable amount of time to issue ID cards to students. 
    By the time they distribute the ID cards, the first semester has passed. Additionally, some 
    students face difficulties in receiving their ID cards due to the overwhelming workload of the 
    staff. In some cases, incorrect details are entered and printed. As a result, students are 
    required to reapply for their ID cards.    
</p ><p >
    In my project, assigning the management as administrators and staff and students as users proves to be beneficial.
    The management can create, view, and delete users, as well as access student data. Next, staff members should 
    collect email addresses from students and store them in the database. Afterward, they can generate ID cards and 
    save them for printing. Subsequently, students must log in to the website using their email addresses with OTP 
    verification. Then, they need to fill out the visible form with their details and submit it. The system should 
    maintain the data for future reference. This system enables students to receive their ID cards promptly, avoiding 
    issues such as missing or incorrect details. Additionally, the data of every student is securely maintained.
</p>

    
<footer>
    <p class="pr">&copy; 2024 Alagappa Arts & Science College , KARAIKUDI</p>
</footer>
</body>
</html>
<style>
   body{
    background: #ffffff url(/im/adminpage_backgroud.jpg) center center/cover no-repeat;
    height: 850px;
}
    h1{
        text-align: center;
        font-size: 40px;
        font-weight: 600;
        margin-top: 50px;
        color: darkblue;
        margin-left: 150px;
       
    }

    p{
        margin-left: 300px;
        font-size: 25px;
        margin-top: 50px;
        color: #ffffff;
        text-indent: 150px;
        text-align: justify;
        margin-right: 20px;
    }

    footer{
        margin: 50px 300px 0;
        color: white;
        background-color: black;
        width: 1300px;
        
    }

    .pr{
        margin-left: 200px;
        font-size: 25px;
        margin-top: 50px;
        color: #ffffff;
        text-indent: 150px;
        
    }

</style>