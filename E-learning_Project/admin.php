<?php 
include_once('components/compTop.php');
?>
    <span id="background" class="margin-top">
      <img src="assets/Polygon 1.svg" alt="" />
      <img src="assets/Polygon 2.svg" alt="" />
    </span>
    <main id="admin">
      <h1>Courses</h1>
      <div id="sectionwrapper">
        <section>
          <!-- THE BELOW DIV AND ITS CHILDREN SHOULD BE CREATED FOR EACH OF COURSE AND THE CONTENT -->
          <a href=""
            ><div class="course">
              <div></div>
              <div><h3>[COURSE NAME]</h3></div>
            </div>
          </a>
          <div class="course">
            <div></div>
            <div><h3>[COURSE NAME]</h3></div>
          </div>
          <div class="course">
            <div></div>
            <div><h3>[COURSE NAME]</h3></div>
          </div>
          <div class="course">
            <div></div>
            <div><h3>[COURSE NAME]</h3></div>
          </div>
        </section>
        <section>
          <button class="btn-primary">CREATE COURSE</button>
        </section>
      </div>
    </main>
    <?php
    include_once('components/compBottom.php');
    ?>