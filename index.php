<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Mobile Phone Purchase" />
    <meta name="keywords" content="HTML5, tags, phone, purchase" />
    <meta name="author" content="Muhammad Abubakar"  />
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="styles/styles.css">
    <script src="scripts/button.js"></script>
    </script>
    <title>Mobile Phone Purchase</title>
  </head>
  <body>


    <?php
      include 'includes/header.inc';
      include 'includes/menu.inc';
    ?>

    <!--background intro banner-->
      <section id="intro-banner">
				<h2>Why iProducts is the&nbsp;best place to&nbsp;buy iPhone.</h2>
				<p class="tile">You can choose a payment option that works for you, pay less with a trade‑in, connect your new iPhone to your carrier, and get set up quickly. <br class="small-hide">You can also chat with a Specialist&nbsp;anytime.</p>
        <br>
        <!--navigate user to product page-->
        <p> <button type="button" id="orderNow">Check Our Products</button> </p>
      </section>
      <section>
        <h2>Our Company</h2>
        <p>
          Welcome to iProducts, your number one source for iPhones. We're dedicated to giving you the very best of products. <br><br> Our team is working tirelessly every day to make your shopping experience better. We are thrilled that we're able to turn our passion into our own website. <br><br>Customer satisfaction is our main priority and our dedicated teams of sales professionals have enables us to cover a sectionersified range of customers within and outside Australia. We hope you enjoy our products as much as we enjoy offering them to you. <br><br>Sincerely,<br>iProducts
        </p>
      </section>
      <section id="cool">
        <h2>Our Products</h2>
        <p id="instruction">
          Click on the phone to be directed to the products page
        </p>
        <img src="styles/images/banner.png" alt="banner" id="banner" usemap="#workmap">
        <map name="workmap">
          <area shape="poly" coords="600,165,1125,163,1130,837,600,837" alt="Products" href="product.html">
        </map>
      </section>
    <hr>
    <?php
      include 'includes/footer.inc';
    ?>

  </body>
</html>
