<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="description" content="Mobile Phone Purchase" />
  <meta name="keywords" content="HTML5, tags, phone, purchase" />
  <meta name="author" content="Muhammad Abubakar"  />
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="styles/styles.css">
  <title>Enhancements Part 2</title>
</head>
  <body>

        <?php
          include 'includes/header.inc';
          include 'includes/menu.inc';
        ?>
    <section>
      <h2>Javascript Enhancement #1</h2>
      <p>On enquire.html, set the selection of certain product/service options to disable the ability to select another sets of options.
        I used this for iPhone categories, the selection of an “iPhone 12” disables the ability to select iPhone 11/pro/max and iPhone x/s/max.</p>
      <ul>
        <li>When the user select a product, they are given option to choose the model of the respective product. When user selects iPhone 12
        they will not be shown options of other products. We assign a product, a subcategories and link it to each other.</li>
        <li> <a href="enquire.php#product">Click here to view Enhancement.</a></li>
        <li>Help taken from w3schools. No library used.</li>
      </ul>
      <img src="images/js_enhancement1.png" alt="enhancement code" class="enhancement-pics">
    </section>
    <section>
      <h2>Javascript Enhancement #2</h2>
      <p>On payment.html, pre-load the 'Name on Credit Card' as a concatenation of the firstname and
        lastname, into the input field, to enable a user to change the value.</p>
      <ul>
        <li>I used sessionStorage to grab the previously enter information, concatenate it and assign it to "card-name" ID.</li>
        <li> <a href="payment.php#card-name">Click here to view enhancement.</a></li>
        <li>No external help taken. No library used.</li>
      </ul>
      <img src="images/js_enhancement2.png" alt="enhancement code" class="enhancement-pics"><br>
    </section>

    <hr>

        <?php
          include 'includes/footer.inc';
        ?>
  </body>
</html>
