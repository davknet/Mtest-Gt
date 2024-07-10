<?php
use Inc\Cls\UserLocalPlace;
use Inc\Cls\EnsureThemeHasFooter;
use Inc\Cls\EnsureThemeHaseHeader;

/**
 * Template Name: Mtest-gt-forntend
 */

//  $header =  EnsureThemeHaseHeader::get_instance() ;

//  $header->getHeader();

get_header();

  $ipBringer  =   UserLocalPlace::get_instance();


  $flag = $ipBringer->checkAndSetCookie() ;

   $flag_url = MTEST_GT_PLUGIN_URL . 'src/img/flags/'. $flag .'.svg';




?>
<!-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet"> -->
<div class="container">
  <div x-data="{ activeTab: 'tab5' }" class="tabs">
    <ul class="tab-links">
      <li :class="{ 'active': activeTab === 'tab5' }"><a @click.prevent="activeTab = 'tab5'"> <img src="<?php echo esc_url($flag_url)  ; ?>" alt="">          </a></li>
      <li :class="{ 'active': activeTab === 'tab6' }"><a @click.prevent="activeTab = 'tab6'"><?php  _e('User Profile'); ?></a></li>
      <li :class="{ 'active': activeTab === 'tab7' }"><a @click.prevent="activeTab = 'tab7'"> <?php _e('Simple Page') ;?>  </a></li>
      <li :class="{ 'active': activeTab === 'tab8' }"><a @click.prevent="activeTab = 'tab8'"><?php _e('Setting Page '); ?></a> </li>
    </ul>
    <div class="tab-content">
      <div id="tab5" x-show="activeTab === 'tab5'">
        <h2>User Settings</h2>
        <p>Content for User Settings.</p>
        <?php echo  '<img src=" esc_url($flag_url) " alt="">' ; ?>
        <pre>
        <p><?php ; ?></p>
        </pre>
      </div>
      <div id="tab6" x-show="activeTab === 'tab6'">
        <h2>User Profile</h2>
        <p>Content for User Profile.</p>
      </div>
      <div id="tab7" x-show="activeTab === 'tab7'">
        <h2>Tab 3</h2>
        <p>Content for Tab 3.</p>
      </div>
      <div id="tab8" x-show="activeTab === 'tab8'">
        <h2>Tab 4</h2>
        <p>Content for Tab 4.</p>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>



<script>

document.addEventListener('DOMContentLoaded', function() {
  const tabs = document.querySelectorAll('.tab-links li');
  const contents = document.querySelectorAll('.tab');

  tabs.forEach(tab => {
    tab.addEventListener('click', function(e) {

      e.preventDefault();
      // alert('good job david ');

      // Remove active class from all tabs and contents
      tabs.forEach(item => item.classList.remove('active'));
      contents.forEach(content => content.classList.remove('active'));

      // Add active class to the clicked tab and corresponding content
      tab.classList.add('active');
      const activeTab = tab.querySelector('a').getAttribute('href');
      document.querySelector(activeTab).classList.add('active');
    });
  });
});

</script>










 
     <!-- <header>
        <h1>Dynamic Page Example</h1>
    </header>

    <section>
        <article>
            <h2>Article 1 Title</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel convallis dolor, eget gravida elit.</p>
        </article>
        
        <article>
            <h2>Article 2 Title</h2>
            <p>Integer quis tellus a ante eleifend tristique. Aliquam sit amet orci quis nisi auctor fringilla.</p>
        </article>
    </section>

    <footer>
        <p>&copy; 2024 Your Website Name. All rights reserved.</p>
    </footer> -->


 <?php get_footer() ; ?> 


