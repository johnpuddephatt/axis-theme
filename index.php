<!doctype html>
<html class="scroll-smooth" <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://js.chargebee.com/v2/chargebee.js" data-cb-site="axisweb" ></script>
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php do_action("get_header"); ?>

    <div id="app" <?php if (is_front_page()) { ?>
            class="transition-colors
            duration-1000
            bg-axis-yellow" <?php } ?>
        >
      <?php echo view(app("sage.view"), app("sage.data"))->render(); ?>
    </div>

    <?php do_action("get_footer"); ?>
    <?php wp_footer(); ?>
  </body>
</html>
