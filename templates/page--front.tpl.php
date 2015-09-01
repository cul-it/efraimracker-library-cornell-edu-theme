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
      <div class="col-sm-8">
        <div class="cu-logo">
          <img src="/sites/all/themes/bootstrap_racker/images/cul-logo-gray.gif">
          <a id="insignia-link" href="http://www.cornell.edu/">Cornell Insignia</a>
          <div class="unit-signature-links">
            <a id="cornell-link" href="http://www.cornell.edu/">Cornell University</a>
            <a id="unit-link" href="http://www.library.cornell.edu/">Cornell University Library</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4 search-box hidden-xs">
        <?php print render($page['search_box']); ?>
      </div>
    </div> <!-- /row -->
  </div> <!-- /container -->
</section>

<nav class="navbar">
  <div class="container">

    <!-- mobile search and nav buttons -->
    <div class="mobile-nav visible-xs">
      <btn class="btn" data-toggle="collapse" data-target=".navbar-collapse">
        <i class="icon-reorder"></i>
      </btn>
      <btn class="btn btn-search" data-toggle="collapse" data-target=".search-collapse">
        <i class="icon-search"></i>
      </btn>
      <div class="navbar-collapse collapse">
        <div class="navbar-nav">
          <?php print render($page['navigation']); ?>
        </div>
      </div>
      <div class="search-collapse collapse">
        <?php print render($page['search_box']); ?>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-5">
        <?php if ($site_name): ?>
          <a class="brand" href="<?php print $front_page; ?>"><?php print $site_name; ?></a>
        <?php endif; ?>
        <div class="subtitle">Scientist and Artist</a> <span class="divider">|</span> <span class="dates">June 28, 1913 - September 9, 1991</span></div>
      </div>
      <div class="col-sm-7 main-navigation hidden-xs">
        <div class="navbar-collapse collapse">
          <div class="navbar-nav">
            <?php print render($page['navigation']); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>

<section class="hero">
  <div class="container">
    <img src="/sites/all/themes/bootstrap_racker/images/slideshow/1.jpg" alt="Photo collage of Efraim Racker">
  </div>
</section>

<section class="featured-content">
  <div class="container">

    <?php print render($page['highlighted']); ?>
    <?php print $messages; ?>
    <?php print render($tabs); ?>
    <?php print render($page['help']); ?>
    <?php if ($action_links): ?>
      <ul class="action-links"><?php print render($action_links); ?></ul>
    <?php endif; ?>
    <?php if(drupal_is_front_page()) {
      unset($page['content']['system_main']['default_message']);
    }?>

    <div class="row">
      <div class="col-sm-4">
        <div class="about-racker">
          <?php print render($page['home_about']); ?>
        </div>
      </div>
      <div class="col-sm-4 albums">
        <?php print render($page['home_albums']); ?>
      </div>
      <div class="col-sm-4 lecture-series">
        <?php print render($page['home_lectures']); ?>
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
