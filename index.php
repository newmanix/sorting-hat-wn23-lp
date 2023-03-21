<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Sorting Hat</title>
    <meta name="robots" content="noindex,nofollow" />
        <script src="https://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore.js"></script>
<script> 
    $(document).ready(function() {  

	$('.spell').click(function(e){
            e.preventDefault(); //stop default action of the link
            let spell = $(this).attr("href");  //get category from URL
            loadAJAX(spell);  //load AJAX and parse JSON file
        });
    });	
    
    function loadAJAX(spell)
    {
        $.ajax({  
            type: "GET",
            dataType: "json",  
            url: "api.php?spell=" + spell,
            success: toConsole,
            cache:false
        }).fail(function (jqXHR, textStatus, error) {
        // Handle error here
            alert('error: ' + jqXHR.responseText);
        });
    }
    
    
    
    function toConsole(data)
    {//return data to console for JSON examination
        console.log(data); //to view,use Chrome console, ctrl + shift + j
    }
 
    function potterJSON(data){
        
        let myData = JSON.stringify(data,null,4);
        myData = '<pre>' + myData + '</pre>';
        $('#output').html(myData);
    }
    </script>   

    <style type="text/css">
		* {padding:0; margin:0;}
		html {background-color:#ccc;}
		body {
			font-family: Arial, Helvetica, sans-serif;
			max-width:960px; /* keeps from getting too large on wide screen */
			width:90%; /* shrink to fit screen */
			margin:auto; /* center in html element */
			background-color:#fff;
			padding:20px;
			min-height:100%; /* keeps from getting too large on wide screen */
			}
		img.flexible {
			float:right;
			display:inline-block;
			padding:20px;
			max-width:300px; /* actual size of image */
			width:33%; /* approximate size taken on screen in maximum view */
		}
		p {margin:10px;}
		h1,h2,h3,h4,h5,h6{
			font-weight:normal;
			margin:10px;
			}
		h1.masthead {margin-top:0;}
		footer {
			text-align:center;
			clear:both; /* ride below all items */
			}
		nav{
			text-align:center; /* centers the nav */
		}
		
		nav ul {
				list-style:none; /* removes the bullets */
			}
		nav ul li
			{
				display:inline-block; /* makes horizontal, but able to declare margins */
				margin:0 2%; /* margin left-right, gets smaller as necessary */
			}
		nav a:hover{
			text-decoration: none;
		}	
        
        /* start potter styles */
        
        @font-face {
            font-family: 'Harry-Potter';
            src:url('webfonts_Harry-Potter/Harry-Potter.ttf.woff') format('woff'),
                url('webfonts_Harry-Potter/Harry-Potter.ttf.svg#Harry-Potter') format('svg'),
                url('webfonts_Harry-Potter/Harry-Potter.ttf.eot'),
                url('webfonts_Harry-Potter/Harry-Potter.ttf.eot?#iefix') format('embedded-opentype'); 
            font-weight: normal;
            font-style: normal;
        }

        .potterFont { 
           font-family: 'Harry-Potter';
        } 
        
        .potterPlus{
            font-family: 'Harry-Potter';
            font-size:2em;
            
        }
        
        .houseButton:hover {
            background-color: orange;
        }
        
        houseButton.selected {
            background-color: green;
        }
        
        table#potterTable {
            border-collapse:collapse;
            width:100%;  
        }
        
        table#potterTable td {
            width:20%; 
        }
        
        .staffCursor {
          cursor: url('lego-harry-potter/staff-cursor.png'), pointer;   
        }
        
        table#potterTable p {
            text-align:center; /* align all text/images to center */   
        }
        
        table#potterTable tr:nth-child(even){
            box-shadow: inset 0 0 0 1000px rgba(0,0,0,.2);   
        }
        
        .category {
            cursor:pointer;
        }

        /* end potter styles */
        
        /*  start tooltip styles http://www.css3.info/tooltips-with-css3/ */
        
        /* utilizes hiding title attributes */
        table#potterTable td.category:before{ content:attr(title); display:none; }
        
        
        table#potterTable td.category:hover::before{ width:180px; display:block; background:yellow; border:1px solid black; padding:8px; margin:25px 0 0 10px; }
        
        table#potterTable td.category:hover{ z-index:10; position:relative; }
        /* end tooltip styles */
        
    </style>
</head>
<body>
    <img style="width:150px; float:right" src="lego-harry-potter/sorting-hat.jpg" />
	<header role="banner">
		<h1 class="masthead potterFont">Sorting Hat</h1>
        
	</header>
    <main role="main">
        
	 <header><h2 class="masthead potterFont">Hogwart's Friendium Compendium</h2>
        </header>
        <h3>STARTING POINT OF ASSIGNMENT</h3>
        <p><em></em></p>
    <p>Do you have any friends at Hogwarts?</p>
    <p>Are you a male student from house Ravencroft, with good intentions?</p>
    <p>Are you in search of an evil female staff member from house Slytherin?</p>
    <p>Choose categories below to find your match in the <span class="potterFont">Hogwart's Friend Finder</span> below!</p>
        <p><a href="patronus" class="spell">Patronus!</a></p>
        <table id="potterTable" border='1'>
            <tr>
                <th>name</th>
                <th>role</th>
                <th>house</th>
                <th>gender</th>
                <th>alignment</th>
            </tr>
        </table>
        
        <div id="output"></div>
     </main>
    <footer>
      <small>&copy; 2020, All Rights Reserved ~
      <a href="http://validator.w3.org/check/referer" target="_blank">Valid HTML</a> ~
      <a href="http://jigsaw.w3.org/css-validator/check?uri=referer" target="_blank">Valid CSS</a>
      </small>
    </footer>
    <!-- END Footer -->
</body>
</html>
