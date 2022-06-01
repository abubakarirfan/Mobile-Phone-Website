<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Mobile Phone Purchase" />
    <meta name="keywords" content="HTML5, tags, phone, purchase" />
    <meta name="author" content="Muhammad Abubakar"  />
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Enhancements</title>
  </head>
  <body>

        <?php
          include 'includes/header.inc';
          include 'includes/menu.inc';
        ?>
    <!--description of enhancement 1-->
      <section>
        <h2>HTML & CSS Enhancement # 1</h2>
        <p>I used enhanced CSS code on about page. Whenever you hover over my picture, an overlay with appear which says 'That's me.'</p>
        <ul>
          <li>I used transform element along with with position element, transition element and opacity element. It goes beyond the basic requirement of the assignment. It took me 5 hours to understand how this would work.</li>
          <li>I took help from w3schools to understand this concept. <a href="https://www.w3schools.com/howto/howto_css_image_overlay.asp">(Source)</a> </li>
          <li><a href="about.php#photo">Click here to see the enhancement.</a></li>
        </ul>
      </section>
      <!--description of enhancement 1-->
      <section>
        <h2>HTML & CSS Enhancement # 2</h2>
        <p>I used Map Element on index page. Whenever you click on the phone, it will take you to product page.</p>
        <ul>
          <li>Map element/tag was not taught in the lecture/tutorial.</li>
          <li>Map tag with area tag is required to implement this feature. Area tag takes coordinates as a parameter where the clickable area is needed.</li>
          <li>I took help from w3schools for this.<a href="https://www.w3schools.com/tags/tag_map.asp">(Source)</a></li>
          <li><a href="index.php#cool">Click here to see the enhancement</a></li>
        </ul>
      </section>
    <hr>
    <?php
      include 'includes/footer.inc';
    ?>
  </body>
</html>
