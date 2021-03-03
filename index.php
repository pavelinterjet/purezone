
<?php 



// define variables and set to empty values
$name = $email = $phone = "";

$allowSend = true;

$errors = [];
$resp = [];

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $phone = preg_replace('/[^0-9]/', '', $_POST['phone']);

    if ( empty($_POST["email"]) ) {
        $errors['error']['email'] = 'שדה  ריק'; 
        $allowSend = false;
    } 
    else if (filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        $errors['error']['email'] = 'אימייל לא תקין'; 
        $allowSend = false;
    } 
    else {
        $email = test_input($_POST["email"]);
        $allowSend = true;
    }

    if ( empty($_POST["name"]) ) {
        $errors['error']['name'] = 'שדה ריק'; 
        $allowSend = false;
    }
    else {
        $name = test_input($_POST["name"]);
        $allowSend = true;
    }


    if ( empty($_POST["city"]) ) {
        $errors['error']['city'] = 'שדה ריק'; 
        $allowSend = false;
    }
    else {
        $city = test_input($_POST["city"]);
        $allowSend = true;
    }


    if ( !is_numeric($phone) ) {
        $errors['error']['phone'] = 'מספר טלפון ריק'; 
        $allowSend = false;
    }
    else if( strlen($phone) > 10 ) {
        $errors['error']['phone'] = 'מספר ארוך מדי'; 
        $allowSend = false;
    } 
    else {
        $phone = test_input($_POST["phone"]);
        $allowSend = true;
    }


    if ($allowSend) {

        $to = "pavel@interjet.co.il";
        $subject = "Purezone new message";
        
        $message .= "<h1> PUREZONE.</h1>";
        $message .= "<span> שם: </span>" . $name . '<br/>';
        $message .= "<span> מייל: </span>" . $email . '<br/>';
        $message .= "<span> טלפון: </span>" . $phone . '<br/>';

        
        $header = "From:serv@interjet.co.il \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
        
        $retval = mail ($to,$subject,$message,$header);
        
        if( $retval == true ) {
           $resp['success'] = "הודעה נשלחה בהצלחה!" . ' <br/> ניצור קשר בהקדם!';
        }else {
           $resp['fail'] = "Message could not be sent..." ;
        }

    } else {
        // echo 'dissallow send';
    }

    if( !empty($errors) ) {
        echo json_encode($errors);
    }

    if( !empty($resp) ) {
        echo json_encode($resp);
    }

die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> מטבחים </title>
    <!-- <link rel="icon" type="image/png"  href="fav.png"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="mobile.css">
    <link rel="stylesheet" href="assets/slick-1.8.1/slick/slick.css">
</head>
<body>


<header class="">
    <div class="container">
        <div class="flex_container flex__space_between flex__align_center">
            <div class="menu">
                <div class="is_desktop">
                    <ul class="flex_container flex__align_center">
                        <li> <a href="#about"> עלינו </a> </li>
                        <li> <a href="#charachteristics"> מאפיינים </a> </li>
                        <li> <a href="#covid"> קורונה </a> </li>
                        <li> <a href="#lab"> בדיקות מעבדה </a> </li>
                        <li> <a href="#contact"> צור קשר </a> </li>
                    </ul>
                </div>
                <div class="is_mobile">
                    <div class="toggle_menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <ul class="mobile_m">
                        <li> <a href="#about"> עלינו </a> </li>
                        <li> <a href="#charachteristics"> מאפיינים </a> </li>
                        <li> <a href="#covid"> קורונה </a> </li>
                        <li> <a href="#lab"> בדיקות מעבדה </a> </li>
                        <li> <a href="#contact"> צור קשר </a> </li>
                    </ul>
                </div>
            </div>
            <div class="logo">
                <img src="assets/img/PureZONE.png" alt="">
            </div>
        </div>
    </div>
</header>
<section class='section_one' id='about'>
<div class="decorimg one"></div>
<div class="decorimg two"></div> 
    <div class="flex_container container mobile_flex_reverse_col">
        <div class="flex_col-2 mobile_flex_col-3">
            <div class="contents">
                <div class="small_text">
                    מוצר מהפכני מבית Hexis, צרפת
                </div>
                <div class="title">
                    <div class="big_text">
                        <span class='light'> הגנה מקסימלית </span>
                        <span class="semibold"> מחיידקים! </span>
                    </div>
                </div>
                <div class="text small_text">
                    יריעה שקופה וכמעט בלתי נראית העשויה מ PVC  פולימרי ומכילה
                    חומרים אנטיבקטריאלים אשר מסוגלים להפוך כל משטח למקום סטרילי
                    מחיידקים ב 99.9% בקלות ובמהירות!
                </div>
                <div class="links flex_container flex__space_between">
                    <a href="#contact" class="small_text"> צור קשר </a>
                    <a href="#video" class="small_text"> צפו בסרטון </a>
                </div>
            </div>
        </div>
        <div class="flex_col-3 mobile_flex_col-3">
            <div class="thumb">
                <img src="assets/img/1858.png" alt="">
            </div>
        </div>
    </div>
</section>



<section class='section_two' id='charachteristics'>
    <div class="decorimg three"></div> 
        <div class="container">
            <div class="is_desktop">
                <div class="flex_container flex__center ">
                    <div class="flex_col-3 mobile_flex_col-2">
                        <div class="content">
                            <div class="thumb">
                                <img src="assets/img/icon1.jpg" alt="">
                            </div>
                            <div class="title"> יעיל בהגנה מפני COVID-19 </div>
                        </div>
                    </div>
                    <div class="flex_col-3 mobile_flex_col-2">
                        <div class="content">
                            <div class="thumb">
                                <img src="assets/img/icon2.jpg" alt="">
                            </div>
                            <div class="title"> תקינה ע"י מעבדות מובילות באירופה  </div>
                        </div>
                    </div>
                    <div class="flex_col-3 mobile_flex_col-2">
                        <div class="content">
                            <div class="thumb">
                                <img src="assets/img/icon3.jpg" alt="">
                            </div>
                            <div class="title"> פריסה ארצית </div>
                        </div>
                    </div>
                </div>
                <div class="flex_container flex__center ">
                    <div class="flex_col-3 mobile_flex_col-2">
                        <div class="content">
                            <div class="thumb">
                                <img src="assets/img/icon4.jpg" alt="">
                            </div>
                            <div class="title"> יוצר סביבה סטרילית מחיידקים </div>
                        </div>
                    </div>
                    <div class="flex_col-3 mobile_flex_col-2">
                        <div class="content">
                            <div class="thumb">
                                <img src="assets/img/icon5.jpg" alt="">
                            </div>
                            <div class="title"> שקוף ולא פוגע בנראות </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="is_mobile">
                <div class="caru">


                <div class="flex_col-3 mobile_flex_col-2">
                        <div class="content">
                            <div class="thumb">
                                <img src="assets/img/icon1.jpg" alt="">
                            </div>
                            <div class="title"> יעיל בהגנה מפני COVID-19 </div>
                        </div>
                    </div>
                    <div class="flex_col-3 mobile_flex_col-2">
                        <div class="content">
                            <div class="thumb">
                                <img src="assets/img/icon2.jpg" alt="">
                            </div>
                            <div class="title"> תקינה ע"י מעבדות מובילות באירופה  </div>
                        </div>
                    </div>
                    <div class="flex_col-3 mobile_flex_col-2">
                        <div class="content">
                            <div class="thumb">
                                <img src="assets/img/icon3.jpg" alt="">
                            </div>
                            <div class="title"> פריסה ארצית </div>
                        </div>
                    </div>
                    <div class="flex_col-3 mobile_flex_col-2">
                        <div class="content">
                            <div class="thumb">
                                <img src="assets/img/icon4.jpg" alt="">
                            </div>
                            <div class="title"> יוצר סביבה סטרילית מחיידקים </div>
                        </div>
                    </div>
                    <div class="flex_col-3 mobile_flex_col-2">
                        <div class="content">
                            <div class="thumb">
                                <img src="assets/img/icon5.jpg" alt="">
                            </div>
                            <div class="title"> שקוף ולא פוגע בנראות </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</section>


<section class='section_three' id='covid'>
    <div class="container">
        <div class="flex_container ">
            <div class="flex_col-3 mobile_flex_col-3">
                <div class="title middle_text">
                יעיל ואפקטיבי נגד COVID19!
                </div>
            </div>
        </div>
        <div class="flex_container ">
            <div class="flex_col-2 mobile_flex_col-3">
                <div class="text small_text">
פיור-זון מכיל יוני כסף אשר משתחררים מהשכבה העליונה של הסרט
כשהם באים במגע עם לחות. יוני הכסף חוסמים את חילוף החומרים
של חיידקים ונגיפים ובכך למעשה מונעים את התפשטותם!
                </div>
                <div class="text small_text">
מוצרי פיור-זון מפחיתים את נוכחות נגיף הקורונה ב 95% לאחר  15
דקות, וב 99.87% לאחר שעה בלבד!
                </div>
            </div>
        </div>
    </div>
</section>


<section class='section_four'>
    <div class="container">
        <div class="flex_container" id='lab'>
            <div class="title middle_text">
            בדיקות מעבדה
            </div>
        </div>
        <div class="flex_container ">
            <div class="links">
                <ul>
                    <li> <a href="#" data-pop='1'> <span> Some Clinic in London Placeholder </span> </a> </li>
                    <li> <a href="#" data-pop='2'> <span> Some Clinic in one of Europe’s Captials  Placeholder  </span> </a> </li>
                    <li> <a href="#" data-pop='3'> <span> Clinic in London Placeholder </span> </a> </li>
                    <li> <a href="#" data-pop='4'> <span> Clinic in London Placeholder </span> </a> </li>
                </ul>
            </div>
        </div>
    </div>
</section>


<section class='section_five' id='video'>
    <div class="video">
        <video width="100%" height="100%"  controls='false' poster="assets/img/fw-video.jpg">
            <source src="assets/video.mp4" type="video/mp4">
        </video>
    </div>
</section>

<section class='section_six'>
    <div class="container">
        <div class="flex_container mobile_flex_reverse_col">
            <div class="flex_col-3 mobile_flex_col-3">
                <div class="thumb">
                    <img src="assets/img/mcroscp.jpg" alt="">
                </div>
            </div>
            <div class="flex_col-2 mobile_flex_col-3">
                <div class="title middle_text">
                    היריעה מתאימה לכל שגרת
                    ניקוי, עמידה בפני חומרים
                    כימיים ומחזיקה למשך 5 שנים
                </div>

                <div class="text small_text">
היריעה האנטי-בקטריאלית של פיור-זון היא בעלת יכולת התאמה מושלמת
למגוון רחב של משטחים ומספקת הגנה מירבית באזורים הדורשים היגיינה
גבוהה כגון בתי חולים, קניונים, בתי ספר ואף בבתים פרטיים.
פיור-זון הוא אחד ממוצרי הדגל של חברת Hexis, אחת מחמשת החברות
הגדולות בעולם בתחום, אשר נבדק ועבר תקינה ע"י מעבדות מובילות
בצרפת, שוויץ, בלגיה, פולין ועוד
                </div>
            </div>
        </div>
    </div>
</section>

<section class='section_seven' id='contact'>
    <div class="container flex_container">
        <div class="right">
            <div class="title middle_text">
                יש לכם שאלות? רוצים
                להתייעץ? 
                <br />
                דברו איתנו!
            </div>
            <div class="contact_details">
                <a href="tel:+97212345678"> <span class="phone">  12-345678 972+ </span> </a>
                <a href="mailto:hello@purezone.co.il"> <span class="email"> hello@purezone.co.il </span> </a>
            </div>
        </div>
        <div class="left">
            <form action="" id='form' novalidate="novalidate">
                <legend> דברו איתנו! </legend>
                <div class="form_row name">
                    <input type="text" id='fld1' name='name' value="" placeholder="שם מלא" >
                    <div class="errors"></div>
                </div>
                <div class="form_row email">
                    <input type="email" id='fld2' name='email' value="" placeholder="מייל" >
                    <div class="errors"></div>
                </div>
                <div class="form_row">
                    <input type="tel" id='fld3' name='phone' value="" placeholder="טלפון" required="false">
                    <div class="errors"></div>
                </div>
                <div class="form_row submit">
                    <button type="submit" name='name' > שליחת הודעה </button>
                </div>
                <span class='notice'>
                    בלחיצה על הכפתור אתה מאשר את הסכמתך למדיניות הפרטיות
                </span>

                <div class="thankyou">
                    <div class="flex_container flex__align_center flex__center">
                        הודעה נשלחה בהצלחה! <br/> ניצור קשר בהקדם!
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="credits ">
<div class="decorimg four"></div>
    <div class="container">
        <a href="https://www.interjet.co.il/"> <span> Design by Interjet 2021 </span> </a>
    </div>
</section>


<div class="popup_wrapper">
    <div class="popup">
        <div class="close">
            <span></span>
            <span></span>
        </div>
        <div class="content">
        </div>
    </div>
</div>


<script src="jquery.js"></script>
<script src="main.js"></script>
<script src="assets/slick-1.8.1/slick/slick.min.js"></script>

</body>
</html>
