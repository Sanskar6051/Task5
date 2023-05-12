<?php
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "imgdb"; 

$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT Image FROM forimg";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);
$num_rows -= 1;

if (mysqli_num_rows($result) > 0) {
    $images = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $images[] = $row['Image'];
    }
} else {
    echo "No images found in the database.";
}

?>
<html>
<head>
    <title>carousel</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
     <main>

     <?php
        
        foreach ($images as $image) {
            echo '<img src="' . $image . '" alt="" class="slide">';
        }
        ?>
    </main>
    <div class="nav">
        <button onclick="goPrev()">
            Prev
        </button>
        <button onclick="goNext()">
            Next
        </button>
    </div> 
    <script>
    const slides = document.querySelectorAll(".slide")
    var num ="<?php echo $num_rows; ?>";
    console.log(num);
    var counter=0 

    slides.forEach(
        (slide, index) => {
            slide.style.left =  `${index * 100}%`
        }
    )

    const goPrev = () =>{
        if(counter==0)
        {
            counter=num
        }
        else{
            counter--
        }
        slideImage()
    }

    const goNext = () =>{
        if(counter==num)
        {
            counter=0
        }
        else{
            counter++
        }
        slideImage()
    }


    const slideImage = () => {
        slides.forEach(
            (slide) => {
                console.log(counter)
                slide.style.transform = `translateX(-${counter * 100}%)`
            }
        )
    }    
</script>
</body>
</html>



