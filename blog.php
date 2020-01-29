<?php
//link to database
include ("includes/config.php");
include ("includes/db.php");

//setting title
$title = "London 24 Racing Blog";

//include header
include "includes/header.php";

//database query, fetching all posts, descending order
$query ="SELECT * FROM posts ORDER BY id DESC";
$posts = $db->query($query);

$numberOfRows = $posts->num_rows;


?>



<script>
    const mq = window.matchMedia( "(min-width: 600px)" );

    $(document).ready(check);
    $(window).resize(check);



    function check(){//change number of words depending on width in the category blog page
        var theString = $(".trimmed-words").html(); //the string
        var contentWidth = $(document).width(); //get width of browser
        if(contentWidth < 600){
            var maxLength = 80 // maximum number of characters to extract
        }
        else if (contentWidth >= 600 && contentWidth < 1025){
            var maxLength = 400
        }
        else if (contentWidth >= 1025 && contentWidth < 1279){
            var maxLength = 40
        }
        else if (contentWidth >= 1279){
            var maxLength = 75
        }
        //trim the string to the maximum length
        var trimmedString = trimmedStringOriginal.substr(0, maxLength);

        //re-trim if we are in the middle of a word
        trimmedString = trimmedString.substr(0, Math.min(trimmedString.length, trimmedString.lastIndexOf(" ")));
        $(".trimmed-words").html(trimmedString);
    }
    var trimmedStringOriginal = $(".content").html();





    $(".small-gallary")

    function  check() {
        if (mq.matches) {
            $(".small-gallary").css("height", $(".Racing-Section").height());
        } else {
            $(".small-gallary").css("height", "400px");
        }
    }




</script> <!-- Resize reduce word count -->


<script>

    var numOfRows = <?php echo $numberOfRows; ?>;
    var flag = 0;

    $(document).ready(function(){
        buttonController();

        $.ajax({

                type: "GET",
                url: "get_data.php",
                data: {
                    'offset': 0,
                    'limit': 3
                },
            success: function(data){
                $('.container').append(data);
                flag += 3;

            }

        });





    });

    function loadPosts(){
        buttonController();

        $.ajax({

            type: "GET",
            url: "get_data.php",
            data: {
                'offset': flag,
                'limit': 3
            },
            success: function(data){
                $('.container').append(data);
                flag += 3;
            }

        })
    }

    function buttonController() {
        if(flag >= numOfRows){
            document.getElementById('load_more').style.display = "none";
        }

    }

</script>

<div class="container"></div>


<footer>
    <div class="button-container">
        <button id="load_more" onclick="loadPosts()" class="read-more loadPosts">Load More</button>
    </div>
</footer>

</body>
</html>


