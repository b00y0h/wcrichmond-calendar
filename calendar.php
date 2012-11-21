<!-- START All-in-One Event Calendar Plugin - Version <?php echo AI1EC_VERSION ?> -->
<div class="ai1ec-calendar-toolbar clearfix">

      <?php if( $categories || $tags ): ?>
          <div class="ai1ec-filters-container">
            <span class="ai1ec-label">
              <a class="ai1ec-clear-filters" rel="tooltip" title="<?php _e( 'Clear Filters', AI1EC_PLUGIN_NAME ) ?>"><i class="icon-remove"></i></a>
            </span>

              <span class="ai1ec-filter-selector-container">
                <a class="btn ai1ec-dropdown">
                  <i class="icon-folder-open"></i>
                </a>
                <input class="ai1ec-selected-terms"
                  id="ai1ec-selected-categories"
                  type="hidden"
                  value="<?php echo $selected_cat_ids ?>" />
                <div class="ai1ec-filter-selector ai1ec-category-filter-selector">
                  <ul>

                      <?php foreach( $categories as $cat ): ?><li class="ai1ec-category"
                        <?php if( $cat->description ) echo 'title="' . esc_attr( $cat->description ) . '"' ?>>
                        <?php echo $cat->color ?>
                        <?php echo esc_html( $cat->name ) ?>
                        <input class="ai1ec-term-ids" name="ai1ec-categories" type="hidden" value="<?php echo $cat->term_id ?>" />
                      </li><?php endforeach ?>

                  </ul>
                </div>
              </span>

            <?php if( $tags ): ?>
              <span class="ai1ec-filter-selector-container">
                <a class="btn ai1ec-dropdown">
                  <i class="icon-tags"></i>
                  <?php _e( 'Tags', AI1EC_PLUGIN_NAME ) ?>
                  <span class="caret"></span>
                </a>
                <input class="ai1ec-selected-terms"
                  id="ai1ec-selected-tags"
                  type="hidden"
                  value="<?php echo $selected_tag_ids ?>" />
                <div class="ai1ec-filter-selector ai1ec-tag-filter-selector">
                  <ul>
                    <?php foreach( $tags as $tag ): ?>
                      <li class="ai1ec-tag"
                        <?php if( $tag->description ) echo 'title="' . esc_attr( $tag->description ) . '"' ?>
                        style="<?php echo $tag->count > 1 ? 'font-weight: bold;' : 'font-size: 10px !important;' ?>">
                        <?php echo esc_html( $tag->name ) . " ($tag->count)" ?>
                        <input class="ai1ec-term-ids" name="ai1ec-tags" type="hidden" value="<?php echo $tag->term_id ?>" />
                      </li>
                    <?php endforeach ?>
                  </ul>
                  <input class="ai1ec-selected-terms" id="ai1ec-selected-tags" type="hidden" />
                </div>
              </span>
            <?php endif // $tags ?>
          </div>
      <?php endif // $categories || $tags ?>
</div>

<div id="ai1ec-calendar-view-container">
  <div id="ai1ec-calendar-view-loading" class="ai1ec-loading"></div>
  <div id="ai1ec-calendar-view">
    <?php echo $view ?>
  </div>
</div>

<?php if( $show_subscribe_buttons ): ?>
  <a class="btn ai1ec-subscribe"
    href="<?php echo AI1EC_EXPORT_URL ?>"
    title="<?php _e( 'Subscribe to this calendar using your favourite calendar program (iCal, Outlook, etc.)', AI1EC_PLUGIN_NAME ) ?>" />
    <?php _e( '✔ Subscribe', AI1EC_PLUGIN_NAME ) ?>
    <span class="ai1ec-subscribe-filtered"><?php _e( 'to this filtered calendar', AI1EC_PLUGIN_NAME ) ?></span>
  </a>
  <a class="btn ai1ec-subscribe-google" target="_blank"
    href="http://www.google.com/calendar/render?cid=<?php echo urlencode( str_replace( 'webcal://', 'http://', AI1EC_EXPORT_URL ) ) ?>"
    title="<?php _e( 'Subscribe to this calendar in your Google Calendar', AI1EC_PLUGIN_NAME ) ?>" />
    <img src="<?php echo $this->get_theme_img_url( 'google-calendar.png' ) ?>" />
    <?php _e( 'Subscribe in Google Calendar', AI1EC_PLUGIN_NAME ) ?>
  </a>
<?php endif ?>
<!-- END All-in-One Event Calendar Plugin -->
