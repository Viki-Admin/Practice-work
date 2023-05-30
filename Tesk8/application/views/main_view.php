
<div class="wrapper">

    <h1 class="all">Welcome to us!</h1>

<a class="arrow-3" href="avto">Further
    <svg class="arrow-3-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
        <g fill="none" stroke="#337AB7" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
            <circle class="arrow-3-iconcircle" cx="16" cy="16" r="15.12"></circle>
            <path class="arrow-3-icon--arrow" d="M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98"></path>
        </g>
    </svg>
</a>
</div>  
<?

    if ($_SESSION['error']) 
    {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    
    if ($_SESSION['mess']) 
    {
        echo $_SESSION['mess'];
        unset($_SESSION['mess']);
    }
        
?>