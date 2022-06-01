<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="description" content="Enquiry about Mobile Phone Purchase"/>
    <meta name="keywords" content="html, tags, forms"/>
    <meta name="author" content="Muhammad Abubakar"/>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="styles/styles.css">
    <script src="scripts/part2.js" type="text/javascript"></script>
    <script src="scripts/enhancements.js" type="text/javascript"></script>
    <title>Enquiry Form</title>
  </head>
  <body>
    <?php
      include 'includes/header.inc';
      include 'includes/menu.inc';
    ?>
    <!--personal information form for order -->
      <section class="form">
        <h2>Enquiry Form</h2>
      <form id="product-enquiry" action="payment.php" method="post" novalidate = "novalidate">
        <fieldset>
          <!--persoal details-->
          <legend>Personal Details</legend>
          <p>
            <label for="firstname">First Name: </label> <em> * </em>
            <input type="text" name="firstname" id="firstname" maxlength="25" required/>

            <label for="lastname">Last Name:</label> <em> * </em>
            <input type="text" name="lastname" id="lastname" maxlength="25" required/>
          </p>
          <p><label for="email">Email Address: </label>  <em> * </em>
            <input type="email" name="email" id="email" required/>
          </p>
        </fieldset>
        <fieldset>
          <legend>Address</legend>
          <p><label for="street">Street Address: </label>  <em> * </em>
            <input type="text" name="street" id="street" maxlength="40"/>
          </p>
          <p><label for="suburb">Suburb/Town:</label>  <em> * </em>
            <input type="text" name="suburb" id= "suburb" required maxlength="20">
          </p>
          <p><label for="state">State: </label>  <em> * </em>
            <select name="state" id="state" required>
              <option value="">Please Select</option>
  				    <option value="Victoria">VIC</option>
  				    <option value="New South Wales">NSW</option>
              <option value="Queensland">QLD</option>
              <option value="Northern territory">NT</option>
              <option value="Western Australia">WA</option>
              <option value="South Australia">SA</option>
              <option value="Tasmania">TAS</option>
              <option value="Australian Capital Territory">ACT</option>
            </select>
          <label for="postcode">Postcode:</label>  <em> * </em>
            <input type="text" name="postcode" id="postcode" required>
          </p>


        </fieldset>

        <!--contact information-->
        <fieldset>
          <legend>Contact Details: </legend>
          <p>
            <label for="phonenumber">Phone Number:</label>  <em> * </em>
              <input type="text" name="phonenumber" required id="phonenumber" placeholder="61-2-3333-232" maxlength="10">
          </p>
          <p>
            <label for="contactpref">Preferred Contact:</label> <em> * </em>
              <input type="radio" name="contact" value="Email" required id="contactpref">Email
              <input type="radio" name="contact" value="Post">Post
              <input type="radio" name="contact" value="Phone">Phone
          </p>
          <!--order details-->
        </fieldset>
        <fieldset>
          <legend>Product Details: </legend>
          <p><label for="product">Product:</label> <em> * </em>
          <select name="product" id="product" required >
            <option value="" selected="selected">Select product</option>
          </select>
          </p>
          <p><label for="model">Model:</label> <em> * </em>
          <select name="model" id="model" required >
            <option value="" selected="selected">Select Model</option>
          </select>
          </p>
          <p><label for="memory">Memory: </label> <em> * </em>
          <select name="memory" id="memory" required >
            <option value="" selected="selected">Select Memory</option>
          </select>
          </p>
          <p>
            <label for= "quantity">Quantity:</label> <em> * </em>
            <input type="text" name="quantity" id="quantity" required maxlength="2" size="2">
          </p>
        </fieldset>
        <!--details of all products-->
        <fieldset>
          <legend>Price Details</legend>
          <table>
            <thead>
              <tr>
                <th>Phones</th>
                <th>Memory</th>
                <th>Price<br>(USD)</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>iPhone 12</td>
                <td>Basic</td>
                <td>1000<br>(100 per additional memory)</td>
              </tr>
              <tr>
                <td>iPhone 12 Pro</td>
                <td>Basic</td>
                <td>1100<br>(100 per additional memory)</td>
              </tr>
              <tr>
                <td>iPhone 12 Pro Max</td>
                <td>Basic</td>
                <td>1200<br>(100 per additional memory)</td>
              </tr>
              <tr>
                <td>iPhone 11</td>
                <td>Basic</td>
                <td>800<br>(50 per additional memory)</td>
              </tr>
              <tr>
                <td>iPhone 11 Pro</td>
                <td>Basic</td>
                <td>900<br>(50 per additional memory)</td>
              </tr>
              <tr>
                <td>iPhone 11 Pro Max</td>
                <td>Basic</td>
                <td>1000<br>(50 per additional memory)</td>
              </tr>
              <tr>
                <td>iPhone X</td>
                <td>Basic</td>
                <td>600<br>(50 per additional memory)</td>
              </tr>
              <tr>
                <td>iPhone XS</td>
                <td>Basic</td>
                <td>700<br>(50 per additional memory)</td>
              </tr>
              <tr>
                <td>iPhone XS Max</td>
                <td>Basic</td>
                <td>800<br>(50 per additional memory)</td>
              </tr>
            </tbody>
            </table>
        </fieldset>
        <fieldset>
          <legend>Enquiry Details: </legend>
          <p><label for="product_enquiry">Product:</label>
            <select name="product_enquiry_name" id="product_enquiry">
              <option value="">Please Select</option>
  				    <option value="iPhone 12">iPhone 12</option>
  				    <option value="iPhone 11">iPhone 11</option>
              <option value="iPhone X">iPhone X</option>
            </select>
          </p>
          <p><label for="productfeatures"> Product Features: </label>
            <input type="checkbox" value="camera" name="feature[]" checked ="checked" id="productfeatures">Camera
            <input type="checkbox" value="RAM" name="feature[]">RAM
            <input type="checkbox" value="Screen Display" name="feature[]">Screen Display
            <input type="checkbox" value="Battery" name="feature[]">Battery
            <input type="checkbox" value="Others" name="feature[]">Others
          </p>
            <p><label>Comments:</label>  <br/>
              <textarea name="comments" rows="4" cols="80" placeholder="Specify aspect your are interested in"></textarea>
            </p>
        </fieldset>
        <!--navigation to move forward or backwards-->
        <input type="submit" value="Pay Now"/>
        <input type="reset" value="Reset form" />
      </form>
    </section>

  <hr>
  <?php
    include 'includes/footer.inc';
  ?>
  </body>
</html>
