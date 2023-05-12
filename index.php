<html>
<head>
    <title>carousel</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
     <main>
        <img src="https://picsum.photos/id/237/1000/500" alt=""class="slide">
        <img src="https://picsum.photos/id/202/1000/500" alt=""class="slide">
        <img src="https://picsum.photos/id/238/1000/500" alt=""class="slide">
        <img src="https://picsum.photos/id/239/1000/500" alt=""class="slide">
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
            counter=3
        }
        else{
            counter--
        }
        slideImage()
    }

    const goNext = () =>{
        if(counter==3)
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



