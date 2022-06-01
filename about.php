<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Mobile Phone Purchase" />
    <meta name="keywords" content="HTML5, tags, phone, purchase" />
    <meta name="author" content="Muhammad Abubakar"  />
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="styles/styles.css">
    <title>About me</title>
  </head>
  <body>

    <?php
      include 'includes/header.inc';
      include 'includes/menu.inc';
    ?>

      <section id="intro-about">
        <h6>...</h6>
        <!--descirption list-->
        <section id="dl-list">
          <h2>Personal Information</h2>
          <dl>
            <dt>Name:</dt>
            <dd>Muhammad Abubakar</dd>
            <dt>Student ID:</dt>
            <dd>s103176849</dd>
            <dt>Course:</dt>
            <dd>Bachelor of Computer Science</dd>
            <dt>Major:</dt>
            <dd>Software development</dd>
            <dt>Email:</dt>
            <dd><em><a href="mailto:103176849@student.swin.edu.au">103176849@student.swin.edu.au</a></em></dd>
            <dt>Hobbies:</dt>
            <dd>Soccer and Cricket</dd>
            <dt>Favourite Unit:</dt>
            <dd>Introduction to Programming</dd>
            <dt>Hometown:</dt>
            <dd>Lahore, Pakistan</dd>
            <dt>Previous Education:</dt>
            <dd>A Level - Cambridge International</dd>
            <dt>Career goals:</dt>
            <dd>Software Developer</dd>
          </dl>
        </section>
        <!--photo of me-->
        <section class="photo">
          <h6>...</h6>
            <figure>
              <img src="images/mypic1.jpg" alt="Me" class="image">
            </figure>
            <section class="overlap">
              <h6>...</h6>
              <section class="txt">
                <h3>That's me</h3>
              </section>
            </section>
        </section>
      </section>


      <!--my swinburne timetable-->
      <section>
        <h2 id="tul">Swinburne Timetable</h2>
        <table>
          <thead>
            <tr>
              <th></th>
              <th class="day">Monday</th>
              <th class="day">Tuesday</th>
              <th class="day">Wednesday</th>
              <th class="day">Thursday</th>
              <th class="day">Friday</th>
            </tr>
          </thead>
          <tbody>
            <tr >
              <td class="time">08:00 am</td>
              <td></td>
              <td></td>
              <td rowspan="3" class="NA-table">NA Practical</td>
              <td rowspan="2" class="ITP-table"> ITP LAB 2</td>
              <td></td>
            </tr>
            <tr >
              <td class="time">09:00 am</td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr >
              <td class="time">10:00 am</td>
              <td></td>
              <td rowspan="2" class="ITP-table" >ITP Live Online</td>
              <td rowspan="2" class="ITP-table">ITP Workshop 2</td>
              <td></td>
            </tr>
            <tr >
              <td class="time">11:00 am</td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr >
              <td class="time">12:00 pm</td>
              <td rowspan="2" class="CWA-table">CWA Live Online</td>
              <td rowspan="2" class="CLE-table"> CLE Live Online</td>
              <td></td>
              <td rowspan="2" class="CLE-table"> CLE tutorial</td>
              <td></td>
            </tr>
            <tr >
              <td class="time">01:00 pm</td>
              <td></td>
              <td></td>
            </tr>
            <tr >
              <td class="time">03:00 pm</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr >
              <td class="time">04:00 pm</td>
              <td></td>
              <td rowspan="2" class="CWA-table">CWA lab1</td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td class="time">05:00 pm</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td class="time">06:00 pm</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td class="time">07:00 pm</td>
              <td></td>
              <td></td>
              <td></td>
              <td rowspan="2" class="NA-table">NA Live Online</td>
              <td></td>
            </tr>
            <tr>
              <td class="time">08:00 pm</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
          </table>
      </section>
      <!--hometown information-->
      <section id="hometown">
        <h2>My Hometown</h2>
        Lahore is the city of wonders with a rich history of over a millennium. Lahore the 2nd largest city of Pakistan and is the capital of the province Punjab. Lahore is referred to as the cultural heart of Pakistan as it hosts most of the arts, cuisine, festivals, music, film-making, gardening, and intelligentsia of the country. Lahore has always been a centre for education, where 80 per cent of Pakistan's books are published and remains the foremost centre of literary, educational, and cultural activity in Pakistan. It is also very important from a religious point of view as its hosts' hundreds of temples, shrines, and mosques dating back to hundreds of years.
        <a href="https://lahore.comsats.edu.pk/campusLife/city_info.aspx">(Source)</a><br>
        <figure>
          <a href="https://lahore.comsats.edu.pk/campusLife/city_info.aspx"><img src="images/lahore.jpg" alt="lahore" id="lahore-image"></a>
        </figure>
      </section>

    <hr>
    <?php
      include 'includes/footer.inc';
    ?>
  </body>
</html>
