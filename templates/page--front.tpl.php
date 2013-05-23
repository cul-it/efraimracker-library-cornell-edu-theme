<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['navigation']: Items for the navigation region, below the main menu (if any).
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
?>

<section class="cornell-identity">
  <div class="container">
    <div class="row">
      <div class="span6">
        <div class="cu-logo">
          <img src="/sites/all/themes/bootstrap_racker/images/cul-logo-gray.gif">
          <a id="insignia-link" href="http://www.cornell.edu/">Cornell Insignia</a>
          <div class="unit-signature-links">
            <a id="cornell-link" href="http://www.cornell.edu/">Cornell University</a>
            <a id="unit-link" href="http://www.library.cornell.edu/">Cornell University Library</a>
          </div>
        </div>
      </div>
      <div class="span6 search-box">
        <form class="form-search">
          <input type="text" class="input-medium search-query" placeholder="Search">
          <!-- <button type="submit" class="btn">Search</button> -->
        </form>
      </div>
    </div> <!-- /row -->
  </div> <!-- /container -->
</section>

<nav class="navbar">
  <div class="container">
    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="row">
      <div class="span5">
        <?php if ($site_name): ?>
          <a class="brand" href="<?php print $front_page; ?>"><?php print $site_name; ?></a>
        <?php endif; ?>
        <div class="subtitle">Scientist and Artist <span class="divider">|</span> June 28, 1913 - September 9, 1991</div>
      </div>
      <div class="span7 main-navigation">
        <div class="nav-collapse collapse">
          <div class="nav">
            <?php print render($page['navigation']); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>

<section class="hero">
  <div class="container">
    <div id="myCarousel" class="carousel slide">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
      </ol>
      <!-- Carousel items -->
      <div class="carousel-inner">
        <div class="active item"><img src="/sites/all/themes/bootstrap_racker/images/slideshow/1.jpg"></div>
        <div class="item"><img src="img/slideshow/2.jpg"></div>
        <div class="item"><img src="img/slideshow/3.jpg"></div>
        <div class="item"><img src="img/slideshow/4.jpg"></div>
        <div class="item"><img src="img/slideshow/5.jpg"></div>
      </div>
      <!-- Carousel nav -->
      <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
    <div class="callout-box">
      <?php print render($page['home_callout']); ?>
    </div>
  </div>
</section>

<section class="featured-content">
  <div class="container">

    <?php print render($page['highlighted']); ?>
    <!--<?php print $breadcrumb; ?>-->
    <?php print $messages; ?>
    <?php print render($tabs); ?>
    <?php print render($page['help']); ?>
    <?php if ($action_links): ?>
      <ul class="action-links"><?php print render($action_links); ?></ul>
    <?php endif; ?>
    <?php if(drupal_is_front_page()) {
      unset($page['content']['system_main']['default_message']);
    }?>
    <!--<?php print render($page['content']); ?>-->

    <div class="row">
      <div class="span4 about-racker">
        <?php print render($page['home_about']); ?>
        <!-- <h3>About Efraim Racker</h3>
        <img src="/sites/all/themes/bootstrap_racker/images/racker-portrait.jpg">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget diam id nisl scelerisque luctus interdum quis nibh. Pellentesque suscipit tellus quis nibh faucibus eu aliquam nisl placerat.</p>
         <p class="text-right"><small><a href="#">Read more <i class="icon-double-angle-right"></i></a></small></p> -->
      </div>
      <div class="span4 albums">
        <?php print render($page['home_albums']); ?>
        <h3>Featured art albums</h3>
        <!-- <div class="album-thumbnails">
          <a href="#" title="Album 1 name goes here"><img src="/sites/all/themes/bootstrap_racker/images/album1.jpg"></a>
          <a href="#" title="Album 2 name goes here"><img src="/sites/all/themes/bootstrap_racker/images/album2.jpg"></a>
          <a href="#" title="Album 3 name goes here"><img src="/sites/all/themes/bootstrap_racker/images/album3.jpg"></a>
          <a href="#" title="Album 4 name goes here"><img src="/sites/all/themes/bootstrap_racker/images/album4.jpg"></a>
        </div>
        <p class="text-right"><small><a href="#">See all 78 albums <i class="icon-double-angle-right"></i></a></small></p> -->
      </div>
      <div class="span4 lecture-series">
        <?php print render($page['home_lectures']); ?>
        <!-- <h3>Memorial lecture series</h3>
        <div class="lecture lecture-first">
          <img src="/sites/all/themes/bootstrap_racker/images/cantley.jpg">
          <div class="lecture-title"><a href="#">The Future of Cancer Prevention and Treatment: Moving from Discovery to Implementation</a></div>
          <div class="lecture-info">2012, Lewis Cantley</div>
        </div>
        <div class="lecture">
          <img src="/sites/all/themes/bootstrap_racker/images/ciechanover.jpg">
          <div class="lecture-title"><a href="#">Drug Development in the 21st Century or Are We Going to Cure All Diseases</a></div>
          <div class="lecture-info">2011, Aaron Ciechanover</div>
        </div> -->
      </div>
    </div>
  </div>
</section>

<footer>
  <div class="container">
    <?php print render($page['footer']); ?>
  </div>
</footer>

<?php print render($page['bottom']); ?>
